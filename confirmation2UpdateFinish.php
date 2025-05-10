<?php
$condition = 0;
//required data 
$smallImageInput_a = $_FILES['smallImageInput_a'];
$smallImageInput_b = $_FILES['smallImageInput_b'];
$smallImageInput_c = $_FILES['smallImageInput_c'];
$smallImageInput_d = $_FILES['smallImageInput_d'];
$manualInput = $_FILES['manualInput'];//pdf file
$endingButton = $_POST['endingButton'];

require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

if(!file_exists($smallImageInput_a['tmp_name']) || !file_exists($smallImageInput_b['tmp_name']) || !file_exists($smallImageInput_c['tmp_name']) || !file_exists($smallImageInput_d['tmp_name']) ||
!file_exists($manualInput['tmp_name']) || $endingButton == null){
$condition = 5;
}else{

    $names_of_four_images = array(); //to store the names of the mini images
    $query_miniImages = "SELECT * FROM smallProductImg WHERE shopItemID = $endingButton";
    $query_miniImages_stmt = sqlsrv_query($conn,$query_miniImages);
    if($query_miniImages_stmt == false){
        echo "<script>alert('Operation could not be performed : ERRORconfirmation_query_miniImages');
        window.location.href='updateItems.php';</script>";
    }
    else{
        while ($row = sqlsrv_fetch_array($query_miniImages_stmt,SQLSRV_FETCH_ASSOC)) {
            array_push($names_of_four_images,$row['name']);
        }
    }
    //changing the names of the images
    $smallImageInput_a['name'] = $names_of_four_images[0];
    $smallImageInput_b['name'] = $names_of_four_images[1];
    $smallImageInput_c['name'] = $names_of_four_images[2];
    $smallImageInput_d['name'] = $names_of_four_images[3];
    //change the file name start
    $query_of_manualName = "SELECT * FROM manualNames WHERE shopItemID = $endingButton";
    $query_of_manualName_stmt = sqlsrv_query($conn,$query_of_manualName);
    if($query_of_manualName_stmt == false){
        echo "<script>alert('Operation could not be performed : ERRORconfirmation_query_miniImages');
        window.location.href='updateItems.php';</script>";
    }else{
        while($row2 = sqlsrv_fetch_array($query_of_manualName_stmt,SQLSRV_FETCH_ASSOC)){
            $manualName = $row2['name'];
        }
        $manualInput['name'] = $manualName;  //changing the name of the pdf file
    }
    
    //change the file name end
    //Creating the contents of the images
    $content1 = fopen($smallImageInput_a['tmp_name'], "r");
    $content2 = fopen($smallImageInput_b['tmp_name'], "r");
    $content3 = fopen($smallImageInput_c['tmp_name'], "r");
    $content4 = fopen($smallImageInput_d['tmp_name'], "r");
    $content5 = fopen($manualInput['tmp_name'],"r"); //content of the PDF file
    
    //blob client start
    $containerName1 = "shopsmallimages";
    $containerName2 = "productmanuals";
    $blobClient = BlobRestProxy::createBlobService($connectionString);
    //blob client end
    
    //deleting the blob
    try {
        $blobClient->deleteBlob($containerName1, $names_of_four_images[0]);
        $blobClient->deleteBlob($containerName1, $names_of_four_images[1]);
        $blobClient->deleteBlob($containerName1, $names_of_four_images[2]);
        $blobClient->deleteBlob($containerName1, $names_of_four_images[3]);
    
        //deleting the PDF file
        $blobClient->deleteBlob($containerName2, $manualName);
        //echo "Image deleted successfully.";
    } catch (ServiceException $e) {
        echo "Error: " . $e->getMessage();
    }
    //re-inserting the image
    try {
        $blobClient->createBlockBlob($containerName1, $smallImageInput_a['name'], $content1);
        $blobClient->createBlockBlob($containerName1, $smallImageInput_b['name'], $content2);
        $blobClient->createBlockBlob($containerName1, $smallImageInput_c['name'], $content3);
        $blobClient->createBlockBlob($containerName1, $smallImageInput_d['name'], $content4);
    
        $blobClient->createBlockBlob($containerName2, $manualInput['name'], $content5);
        $condition = 1;
        //echo "Image uploaded successfully.";
    
    } catch (ServiceException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        /* Fade-in animation for the container */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Slide-in animation for the icons */
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }



        .container {
            text-align: center;
            background: #fff;
            color: #333;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            animation: fadeIn 0.8s ease-in-out;
        }

        .container h1 {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 15px;
            animation: slideIn 0.8s ease-in-out;
        }

        .container p {
            font-size: 1rem;
            margin-bottom: 25px;
            animation: slideIn 1s ease-in-out;
        }

        .icon {
            font-size: 3rem;
            margin-bottom: 15px;
            animation: slideIn 0.5s ease-in-out;
        }

        .icon.success {
            color: #28a745;
        }

        .icon.error {
            color: #dc3545;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 25px;
            animation: fadeIn 1.2s ease-in-out;
        }

        .btn-primary {
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #0056b3, #003f7f);
           
        }
    </style>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php if ($condition === 1): ?>
            <div class="icon success">✔️</div>
            <h1 class="text-success">Item Updated Successfully</h1>
            <p>The selected item has been permanently removed from the database.</p>
        <?php elseif ($condition === 5):?>
            <div class="icon error">❌</div>
            <h1 class="text-danger">Failed to Update the Item</h1>
            <p>Enter the required data or re-enter the data.</p>            
        <?php else: ?>
            <div class="icon error">❌</div>
            <h1 class="text-danger">Failed to Update the Item</h1>
            <p>We encountered an error processing your request. Please try again later.</p>
        <?php endif; ?>
        <form action="mainMenu001.php" method="post">
        <input hidden name="up_backend4_passValue" type="text" value="<?php echo "{$temp_data_itemID}";?>">
        <button type="submit" name="btn1" id="btn1" class="btn btn-primary">Previous</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>