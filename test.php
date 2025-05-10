<?php
//azure blob start
require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
//containers start
$containerName = "shopsmallimages";
$container2 = "productmanuals";
//containers end
$blobClient = BlobRestProxy::createBlobService($connectionString);
//azure blob end
$sql = "SELECT MAX(shopItemID) AS maxID FROM shopItems";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $primaryKey = $row['maxID'];
}
//Obtaining the required data start
$specificationName = $_POST['specificationName']; //Specification name
$Spedescription = $_POST['Spedescription']; // Specification description
$deInfoName = $_POST['deInfoName']; //delivary info name
$deInfoDes = $_POST['deInfoDes']; //delivary into description
$additionalInfo = $_POST['additionalInfo']; //additional info
try{
    $manualInput = $_FILES['manualInput']; //manual file
    $smallImageInput_a = $_FILES['smallImageInput_a']; //image 1
    $smallImageInput_b = $_FILES['smallImageInput_b']; //image 2
    $smallImageInput_c = $_FILES['smallImageInput_c']; //image 3
    $smallImageInput_d = $_FILES['smallImageInput_d']; //image 4
}catch(Exception $ee){
    echo "<script>alert('Insert all the four images of the product');
    </script>";
}

//new names
$smallImageInput_a['name'] = "miniImage1{$primaryKey}.jpg";
$smallImageInput_b['name'] = "miniImage2{$primaryKey}.jpg";
$smallImageInput_c['name'] = "miniImage3{$primaryKey}.jpg";
$smallImageInput_d['name'] = "miniImage4{$primaryKey}.jpg";
$manualInput['name'] = "manualFile{$primaryKey}.pdf";
//Obtaining the required data end
//echo "<script>alert('{$specificationName}');</script>";
if(isset($_POST['finishingButton'])){
    //echo "<script>alert('finishingButton');</script>";
    if($manualInput == null){
        echo "<script>alert('Insert the manuel of the item');
        window.location.href='addSpecifications.php';</script>";
    }
    else{
        if(!file_exists($smallImageInput_a['tmp_name']) ||
        !file_exists($smallImageInput_b['tmp_name']) ||
        !file_exists($smallImageInput_c['tmp_name']) ||
        !file_exists($smallImageInput_d['tmp_name']) ||
        !file_exists($manualInput['tmp_name'])){

            echo "<script>alert('Insert all the four images of the product');
            window.location.href='addSpecifications.php';
            </script>";
        }
        else{
        try{
            $content1 = fopen($smallImageInput_a['tmp_name'], "r");
        $content2 = fopen($smallImageInput_b['tmp_name'], "r");
        $content3 = fopen($smallImageInput_c['tmp_name'], "r");
        $content4 = fopen($smallImageInput_d['tmp_name'], "r");
        //pdf
        $content5 = fopen($manualInput['tmp_name'],"r");
        }catch(Exception $es){
            echo "<script>alert('Insert all the four images of the product or re-enter the images');
            window.location.href='addSpecifications.php';
            </script>";
        }
        try {
            //images 
            $blobClient->createBlockBlob($containerName,  $smallImageInput_a['name'], $content1);
            $blobClient->createBlockBlob($containerName,  $smallImageInput_b['name'], $content2);
            $blobClient->createBlockBlob($containerName,  $smallImageInput_c['name'], $content3);
            $blobClient->createBlockBlob($containerName,  $smallImageInput_d['name'], $content4);
            //pdf files
            $blobClient->createBlockBlob($container2,  $manualInput['name'], $content5);

            $smallimgquery1 = "INSERT INTO smallProductImg(name,shopItemID) VALUES (?,?)";
            $smallimgquerypara1 = array($smallImageInput_a['name'],$primaryKey);
            $smallimgquery2 = "INSERT INTO smallProductImg(name,shopItemID) VALUES (?,?)";
            $smallimgquerypara2 = array($smallImageInput_b['name'],$primaryKey);
            $smallimgquery3 = "INSERT INTO smallProductImg(name,shopItemID) VALUES (?,?)";
            $smallimgquerypara3 = array($smallImageInput_c['name'],$primaryKey);
            $smallimgquery4 = "INSERT INTO smallProductImg(name,shopItemID) VALUES (?,?)";
            $smallimgquerypara4 = array($smallImageInput_d['name'],$primaryKey);
            //FILE INPUT
            $smallimgquery5 = "INSERT INTO manualNames(name,shopItemID) VALUES (?,?)";
            $smallimgquerypara5 = array($manualInput['name'],$primaryKey);

            $ministm1 = sqlsrv_query($conn,$smallimgquery1,$smallimgquerypara1);
            $ministm2 = sqlsrv_query($conn,$smallimgquery2,$smallimgquerypara2);
            $ministm3 = sqlsrv_query($conn,$smallimgquery3,$smallimgquerypara3);
            $ministm4 = sqlsrv_query($conn,$smallimgquery4,$smallimgquerypara4);

            $filestmt = sqlsrv_query($conn,$smallimgquery5,$smallimgquerypara5);
            if($ministm1 != false || $ministm2 != false || $ministm3 != false || $ministm4 != false || $filestmt != false){
                echo "<script>alert('Images & documents are updated');
                window.location.href = 'confirmation.php';</script>";
            }else{
                echo "<script>alert('Re-enter the details & try again');
                window.location.href = 'addSpecifications.php';</script>";
            }
        } catch (ServiceException $e) {
            echo "Error: " . $e->getMessage();
        } 
        }
    }
}
if(isset($_POST['specAddBtn'])){
    //echo "<script>alert('specAddBtn');</script>";
    if($Spedescription == null || $specificationName == null || $primaryKey == null){
        echo "<script>alert('Add the specification');
        window.location.href = 'addSpecifications.php';</script>";
    }else{
        $sql2 = "INSERT INTO specifications(name,description,shopItemID) VALUES (?,?,?)";
        $para2 = array($specificationName,$Spedescription,$primaryKey);
        $stmt2 = sqlsrv_query($conn, $sql2, $para2);
        if($stmt2 == false){
            die(print_r(sqlsrv_errors(),true));
        }
        else{
            echo "<script>alert('Specification Added');
             window.location.href = 'addSpecifications.php';</script>";
        }
    }
  
}
if(isset($_POST['deliInfoBtn'])){
   // echo "<script>alert('deliInfoBtn');</script>";
   if($deInfoDes == null || $deInfoName == null || $primaryKey == null){
    echo "<script>alert('Add the relavent information of delivary infoemation');
    window.location.href = 'addSpecifications.php';</script>";
   }else{
    $sql3 = "INSERT INTO delivaryInfo(name,des,shopItemID) VALUES (?,?,?)";
    $para3 = array($deInfoName,$deInfoDes,$primaryKey);
    $stmt3 = sqlsrv_query($conn,$sql3,$para3);
    if($stmt3 == false){
     die(print_r(sqlsrv_errors(),true));
    }
    else{
     echo "<script>alert('Delivary information added');
      window.location.href = 'addSpecifications.php';</script>";
    }
   }
}
if(isset($_POST['additionalInBtn'])){
    //echo "<script>alert('additionalInBtn');</script>";
    if($additionalInfo == null || $primaryKey == null){
        echo "<script>alert('Add the relavent information of additional infoemation');
        window.location.href = 'addSpecifications.php';</script>";
    }else{
        $sql4 = "INSERT INTO additional(addInfo,shopItemID) VALUES (?,?)";
        $para4 = array($additionalInfo,$primaryKey);
        $stmt4 = sqlsrv_query($conn,$sql4,$para4);
        if($stmt4 == false){
            die(print_r(sqlsrv_errors(),true));
            echo "<script>alert('Enter the info & try again');
             window.location.href = 'addSpecifications.php';</script>";
        }
        else{
            echo "<script>alert('Additional information added');
             window.location.href = 'addSpecifications.php';</script>";
        }
    }
}
sqlsrv_free_stmt($stmt);
//header('location:addSpecifications.php');
?>