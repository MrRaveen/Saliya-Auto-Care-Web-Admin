<?php
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
$moreInfoButton = $_POST['moreInfoButton'];
$mainImageQuery = "SELECT imgName FROM shopItems WHERE shopItemID = $moreInfoButton";
$mainImageQueryStmt = sqlsrv_query($conn,$mainImageQuery);
$mainImageName = "";
if($mainImageQueryStmt == false){
    echo "unable to runthe query try again";
    exit;
}else{
    while($mainImagerow = sqlsrv_fetch_array($mainImageQueryStmt,SQLSRV_FETCH_ASSOC)){
        $mainImageName = $mainImagerow['imgName'];
    }
}
$smallImageQuery = "SELECT name FROM smallProductImg WHERE shopItemID = $moreInfoButton";
$smallImagestmt = sqlsrv_query($conn,$smallImageQuery);
$smallImageArray = array();
if($smallImagestmt == false){
    echo "unable to runthe query try again";
    exit;
}else{
    while($smallImageRow = sqlsrv_fetch_array($smallImagestmt,SQLSRV_FETCH_ASSOC)){
        array_push($smallImageArray,$smallImageRow['name']);
    }
}
//blob storage
$containerName = "shopimages";
$containerName2 = "shopsmallimages";
try {
    $blobClient = BlobRestProxy::createBlobService($connectionString);
    $mainImageLink = "http://127.0.0.1:10000/devstoreaccount1/{$containerName}/{$mainImageName}?" . time();
    $smallImageLink1 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$smallImageArray[0]}?" . time();
    $smallImageLink2 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$smallImageArray[1]}?" . time();
    $smallImageLink3 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$smallImageArray[2]}?" . time();
    $smallImageLink4 = "http://127.0.0.1:10000/devstoreaccount1/{$containerName2}/{$smallImageArray[3]}?" . time();

} catch (ServiceException $e) {
    error_log("Blob error: " . $e->getMessage());
    die("Could not retrieve blob.");
}
/**
 * echo "<script>alert('{$mainImageName}');</script>";
*echo "<script>alert('{$smallImageArray[0]}');</script>";
*echo "<script>alert('{$smallImageArray[1]}');</script>";
*echo "<script>alert('{$smallImageArray[2]}');</script>";
*echo "<script>alert('{$smallImageArray[3]}');</script>";
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Saliya Auto Care web editor</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Favicon icon -->
   <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
   <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">

   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

   <!-- simple line icon -->
   <link rel="stylesheet" type="text/css" href="assets/icon/simple-line-icons/css/simple-line-icons.css">

   <!-- Required Fremwork -->
   <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

   <!-- Chartlist chart css -->
   <link rel="stylesheet" href="assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">

   <!-- Weather css -->
   <link href="assets/css/svg-weather.css" rel="stylesheet">


   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="assets/css/main.css">

   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
   <!--font asome-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

   <style>
      body {
    overflow-y: hidden; /* Hides vertical scrollbar */
      }
      .testClass{
        border-radius: 0px;
        border: 2px dashed #bbb5ff;
        width:196px;
        display: flex; 
        align-items: center; 
        justify-content: center; 
        height: 100px; 
        border: 1px dashed #ccc;
        background-position: center;
        background-size: cover;
      }

.button2 {
  --width: 96px;
  --height: 30px;
  --tooltip-height: 35px;
  --tooltip-width: 90px;
  --gap-between-tooltip-to-button: 18px;
  --button-color: #222;
  --tooltip-color: #fff;
  width: var(--width);
  font-size: 12px;
  height: var(--height);
  background: var(--button-color);
  position: relative;
  text-align: center;
  font-family: "Arial";
  transition: background 0.3s;
}
/*TEST CSS START*/
 /* From Uiverse.io by pandey_saurav_ */
 .form-container {
      max-width: 400px;
      background-color: #fff;
      padding: 32px 24px;
      font-size: 14px;
      font-family: inherit;
      color: #212121;
      display: flex;
      flex-direction: column;
      gap: 20px;
      box-sizing: border-box;
      border-radius: 10px;
      box-shadow:
        0px 0px 3px rgba(0, 0, 0, 0.084),
        0px 2px 3px rgba(0, 0, 0, 0.168);
      display: none; /* Hidden by default */
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1001;
    }

    .form-container button:active {
      scale: 0.95;
    }

    .form-container .logo-container {
      text-align: center;
      font-weight: 600;
      font-size: 18px;
    }

    .form-container .form {
      display: flex;
      flex-direction: column;
    }

    .form-container .form-group {
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .form-container .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-container .form-group input {
      width: 100%;
      padding: 12px 16px;
      border-radius: 6px;
      font-family: inherit;
      border: 1px solid #ccc;
    }

    .form-container .form-group input::placeholder {
      opacity: 0.5;
    }

    .form-container .form-group input:focus {
      outline: none;
      border-color: #1778f2;
    }

    .form-container .form-submit-btn {
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: inherit;
      color: #fff;
      background-color: #212121;
      border: none;
      width: 100%;
      padding: 12px 16px;
      font-size: inherit;
      gap: 8px;
      margin: 12px 0;
      cursor: pointer;
      border-radius: 6px;
      box-shadow:
        0px 0px 3px rgba(0, 0, 0, 0.084),
        0px 2px 3px rgba(0, 0, 0, 0.168);
    }

    .form-container .form-submit-btn:hover {
      background-color: #313131;
    }

    .popup-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      display: none; /* Hidden by default */
      z-index: 1000;
    }

    .popup-overlay.active,
    .form-container.active {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .popup-overlay.active {
      display: block;
    }
/*TEST CSS END*/
/*CHECK BOX CSS START*/

/*CHECKBOX CSS END*/
/* Custom styles */
    table {
      background-color: #f8f9fa;
      border-radius: 10px;
      border: 1px solid #dee2e6;
      border-radius: 8px;
    }


/**✨✨😒😒🙃 */
        .main-image img {
  max-width: 100%;
  height: auto;
}

.thumb-images img {
  cursor: pointer;
  width: 80px;
  height: 80px;
}

.breadcrumb {
  background: none;
  padding: 0;
}

h1 {
  font-size: 1.8rem;
}

h3 {
  font-size: 1.5rem;
}

ul {
  padding-left: 20px;
}

/*CUSTOMER REVIEW START*/
.review-card {
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  height:448px;
}

.review-card .card-body {
  padding: 20px;
}

.card-title {
  font-size: 1.2rem;
  font-weight: bold;
}

.card-text {
  margin-bottom: 1rem;
  font-size: 0.95rem;
  color: #555;
}

.text-warning {
  font-size: 1rem;
}
/*CUSTOMER REVIEW END*/
table {
            text-align: left;
        }
/*DELIVARY INFORMATION START*/
.delivery-info-card {
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .delivery-info-header {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .icon {
            font-size: 1.2rem;
            color: #0d6efd;
            margin-right: 10px;
        }
        .list-group-item {
            font-size: 1rem;
            border: none;
        }

        .review-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #6c757d;
        }
        /*image small container*/
        .image-container img {
    object-fit: contain; /* Ensures the image fits without stretching */
    width: 100%; /* Adjust to container's width */
    height: 100%; /* Adjust to container's height */
  }
  /**thumbnail */
  .image-container{
    width: 200px; /* Set the desired container width */
    height: 200px; /* Set the desired container height */
    overflow: hidden; /* Ensure no overflow */
    display: flex;
    justify-content: center;
    align-items: center;
  }/**😊😊😊😊😊😊😊😊😊😊 */

  /**scrollable section */
  .scrollable-section {
            height: 530px; /* Set the desired height */
            overflow-y: scroll; /* Enable vertical scrolling */
            padding: 10px; /* Optional: Add padding */
        }

   </style>
</head>

<body class="sidebar-mini fixed" style="background-color:#ebeff2;">
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header-top hidden-print">
         <a href="mainMenu001.html" style="background-color: #39444e; color: #f5f5f5; font-weight: bold;" class="logo">Saliya Auto Care Web Editor</a>
         <nav class="navbar navbar-static-top">
            <ul class="top-nav lft-nav">
               <div class="upgrade-button">
                <button onclick="window.open('http://localhost:8001/')" style="margin-left: 2px;" type="button" class="button">
                    Web Preview
                  </button>
                </div>
                <script>
                  function refreshIframe() {
                  // Reloads the page from the cache
                  location.reload();
                 // Forces a reload from the server
                  location.reload(true);
                  }
                </script>
                <div class="upgrade-button">
                    <button type="button" onclick="refreshIframe()" class="button">
                        Refresh
                      </button>
                </div>
                
            </ul>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">
               <ul class="top-nav">
                   <!-- window screen -->
                   <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="icon-size-fullscreen" style="color: rgb(65, 64, 64);"></i>
                     </a>

                  </li>
                <!--
                 <div class="upgrade-button">
                    <button class="Btn">
  
                        <div class="sign"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 469.333 469.333" style="enable-background:new 0 0 469.333 469.333;" xml:space="preserve"><g><g><g><path d="M466.208,88.458L380.875,3.125c-2-2-4.708-3.125-7.542-3.125H42.667C19.146,0,0,19.135,0,42.667v384 c0,23.531,19.146,42.667,42.667,42.667h384c23.521,0,42.667-19.135,42.667-42.667V96 C469.333,93.167,468.208,90.458,466.208,88.458z M106.667,21.333h234.667v128c0,11.76-9.563,21.333-21.333,21.333H128 c-11.771,0-21.333-9.573-21.333-21.333V21.333z M384,448H85.333V256H384V448z M448,426.667c0,11.76-9.563,21.333-21.333,21.333 h-21.333V245.333c0-5.896-4.771-10.667-10.667-10.667h-320c-5.896,0-10.667,4.771-10.667,10.667V448H42.667 c-11.771,0-21.333-9.573-21.333-21.333v-384c0-11.76,9.563-21.333,21.333-21.333h42.667v128C85.333,172.865,104.479,192,128,192 h192c23.521,0,42.667-19.135,42.667-42.667v-128h6.25L448,100.417V426.667z"/><path d="M266.667,149.333h42.667c5.896,0,10.667-4.771,10.667-10.667V53.333c0-5.896-4.771-10.667-10.667-10.667h-42.667 c-5.896,0-10.667,4.771-10.667,10.667v85.333C256,144.562,260.771,149.333,266.667,149.333z M277.333,64h21.333v64h-21.333V64z" /></g></g></g></svg></div>
                        
                        <div class="text">Save</div>
                      </button>
                   </div>  
                -->
                  <!-- User Menu-->
                  <div class="upgrade-button">
                    <a href="index.php" class="Btn">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="text">Logout</div>
                    </a>
                   </div>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print ">
         <section class="sidebar" id="sidebar-scroll">
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li class="nav-level"><span style="color: white;">---</span> Web</li>
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="mainMenu001.php">
                        <i class="icon-globe"></i><span> Web Preview</span>
                    </a>
                </li>  
               
                <li class="nav-level"><span style="color: white;">---</span> Edit</li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-picture"></i><span>Main Images</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu" style="padding:0px;">
                <!---LOOP OF MAIN IMAGES--->
                <!---START--->
                <?php
                    $nameSet = array("About Image","About Page Image Strip","Brand Background","Contact Us Image Strip","Customer 1 Face",
                    "Customer 2 Face","Customer 3 Face","Customer 4 Face","Main Background 1","Main Background 2","News 1","News 2","News 3","News 4","News 5","Home page service 1"
                    ,"Home page service 2");
                    $mainImages = array("about.jpg","aboutOrg.jpg","brandsBackground.jpg","contactUSbackimage.jpg","customer1.jpg",
                    "customer2.jpg","customer3.jpg","customer4.jpg","mainBackground1.jpg","mainBackground2.jpg","news1.jpg","news2.jpg","news3.jpg","news4.jpg","news5.jpg","service-1.jpg"
                    ,"service-2.jpg");
for($i = 0; $i < 17; $i++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span> ' . $nameSet[$i] . ' </span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu" style="padding:15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="height: 110px;">
                    <form action="dataSend.php" method="post" enctype="multipart/form-data">
                        <label for="input-file-' . $i . '" id="drop-area-' . $i . '">
                            <input type="file" accept="image/*" name="imageInput" id="input-file-' . $i . '" hidden>
                            <div id="img-view-' . $i . '" class="testClass" style="display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc;">
                                <p style="text-align: center; margin: 0;">Drag & drop or click here</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" type="submit" value="'.$mainImages[$i].'" id="uploadbutton-' . $i . '" name="uploadbutton" 
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'"
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" name="discardBtn" id="discardBtn-' . $i . '" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
            </form>
            </div> 
        </ul>
    </li>
    <script>
        document.getElementById("input-file-' . $i . '").addEventListener("change", function() {
            let imgLink = URL.createObjectURL(this.files[0]);
            let imgView = document.getElementById("img-view-' . $i . '");
            imgView.style.backgroundImage = `url(${imgLink})`;
            imgView.textContent = "";
            imgView.style.border = 0;
        });

        document.getElementById("drop-area-' . $i . '").addEventListener("dragover", function(e) {
            e.preventDefault();
        });

        document.getElementById("drop-area-' . $i . '").addEventListener("drop", function(e) {
            e.preventDefault();
            let inputFile = document.getElementById("input-file-' . $i . '");
            inputFile.files = e.dataTransfer.files;
            let imgLink = URL.createObjectURL(inputFile.files[0]);
            let imgView = document.getElementById("img-view-' . $i . '");
            imgView.style.backgroundImage = `url(${imgLink})`;
            imgView.textContent = "";
            imgView.style.border = 0;
        });

        document.getElementById("discardBtn-' . $i . '").addEventListener("click", function(event) {
            let imgView = document.getElementById("img-view-' . $i . '");
            let inputFIle = document.getElementById("input-file-' . $i . '");
            imgView.style.backgroundImage = "";
            imgView.textContent = "Drag & drop or click here";
            imgView.style = "display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc; font-size:13px;";
            inputFIle.value = "";
            event.preventDefault();
        });
        document.getElementById("uploadbutton-' . $i . '").addEventListener("click", function() {
         var testVar1 = document.getElementById("uploadbutton-' . $i . '").value;
        });
    </script>
    ';
}
?>
                <!---END--->
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-picture"></i><span>Images</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu" style="padding:0px;">
                <!---LOOP OF IMAGES--->
                <?php
                    $mainImages2 = array("service-3.jpg","service-4.jpg","service1SideImage.jpg","service2SideImage.jpg","service3SideImage.jpg",
                    "service4SideImage.jpg","serviceBackImage1.jpg","serviceBackImage2.jpg","serviceBackImage3.jpg","serviceBackImage4.jpg","vehicle1.jpg","vehicle2.jpg","vehicle3.jpg","vehicle4.jpg","vehicle5.jpg","vehicle6.jpg"
                    );
                    $nameSet2 = array("Home page service 3","Home page service 4","Service Page Side Image1","Service Page Side Image2","Service Page Side Image3",
                    "Service Page Side Image4","Service back Image1","Service back Image2","Service back Image3","Service back Image4","Interior 1","Interior 2","Interior 3","Interior 4","Interior 5","Interior 6"
                    );
for($p = 0; $p < 16; $p++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span> ' . $nameSet2[$p] . ' </span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu" style="padding:15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="height: 110px;">
                    <form action="dataSend2.php" method="post" enctype="multipart/form-data">
                        <label for="input-file2-' . $p . '" id="drop-area2-' . $p . '">
                            <input type="file" accept="image/*" name="imageInput2" id="input-file2-' . $p . '" hidden>
                            <div id="img-view2-' . $p . '" class="testClass" style="display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc;">
                                <p style="text-align: center; margin: 0;">Drag & drop or click here</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" type="submit" value="'.$mainImages2[$p].'" id="uploadbutton2-' . $p . '" name="uploadbutton2"
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'"
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" name="discardBtn2" id="discardBtn2-' . $p . '" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
                </form>
            </div>  
        </ul>
    </li>

    <script>
        document.getElementById("input-file2-' . $p . '").addEventListener("change", function() {
            let imgLink2 = URL.createObjectURL(this.files[0]);
            let imgView2 = document.getElementById("img-view2-' . $p . '");
            imgView2.style.backgroundImage = `url(${imgLink2})`;
            imgView2.textContent = "";
            imgView2.style.border = 0;
        });

        document.getElementById("drop-area2-' . $p . '").addEventListener("dragover", function(e) {
            e.preventDefault();
        });

        document.getElementById("drop-area2-' . $p . '").addEventListener("drop", function(e) {
            e.preventDefault();
            let inputFile2 = document.getElementById("input-file2-' . $p . '");
            inputFile2.files = e.dataTransfer.files;
            let imgLink2 = URL.createObjectURL(inputFile2.files[0]);
            let imgView2 = document.getElementById("img-view2-' . $p . '");
            imgView2.style.backgroundImage = `url(${imgLink2})`;
            imgView2.textContent = "";
            imgView2.style.border = 0;
        });

        document.getElementById("discardBtn2-' . $p . '").addEventListener("click", function(event) {
            let imgView2 = document.getElementById("img-view2-' . $p . '");
            let inputFIle2 = document.getElementById("input-file2-' . $p . '");
            imgView2.style.backgroundImage = "";
            imgView2.textContent = "Drag & drop or click here";
            imgView2.style = "display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc; font-size:13px;";
            inputFIle2.value = "";
            event.preventDefault(); 
            });
    </script>
    ';
}
?>
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-pencil"></i><span>Icons</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu" style="padding:0px;">
                    <!---ICONS 15 START--->
                    <?php
                    $nameSet3 = array("Vision Logo","Mission Logo","Company logo 1","Company logo 2","Company logo 3",
                    "Company logo 4","Company logo 5","Company logo 6","Background logo 1","Background logo 2","Background logo 3","Facts logo 1","Facts logo 2","Facts logo 3");
                    $mainImages3 = array("vision.jpg","mission.jpg","logo1.jpg","logo2.jpg","logo3.jpg",
                    "logo4.jpg","logo5.jpg","logo6.jpg","squareLogo1.jpg","squareLogo2.jpg","squareLogo3.jpg","blackBoxlogo1.jpg","blackBoxlogo2.jpg","blackBoxlogo3.jpg");
for($s = 0; $s < 14; $s++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span> ' . $nameSet3[$s] . ' </span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu" style="padding:15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="height: 110px;">
                    <form action="dataSend3.php" method="post" enctype="multipart/form-data">
                        <label for="input-file3-' . $s . '" id="drop-area3-' . $s . '">
                            <input type="file" accept="image/*" name="imageInput3" id="input-file3-' . $s . '" hidden>
                            <div id="img-view3-' . $s . '" class="testClass" style="display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc;">
                                <p style="text-align: center; margin: 0;">Drag & drop or click here</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" type="submit" value="'.$mainImages3[$s].'" id="uploadbutton3-' . $s . '" name="uploadbutton3"
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'"
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" name="discardBtn3" id="discardBtn3-' . $s . '" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
                 </form>
            </div>  
        </ul>
    </li>

    <script>
        document.getElementById("input-file3-' . $s . '").addEventListener("change", function() {
            let imgLink = URL.createObjectURL(this.files[0]);
            let imgView = document.getElementById("img-view3-' . $s . '");
            imgView.style.backgroundImage = `url(${imgLink})`;
            imgView.textContent = "";
            imgView.style.border = 0;
        });

        document.getElementById("drop-area3-' . $s . '").addEventListener("dragover", function(e) {
            e.preventDefault();
        });

        document.getElementById("drop-area3-' . $s . '").addEventListener("drop", function(e) {
            e.preventDefault();
            let inputFile = document.getElementById("input-file3-' . $s . '");
            inputFile.files = e.dataTransfer.files;
            let imgLink = URL.createObjectURL(inputFile.files[0]);
            let imgView = document.getElementById("img-view3-' . $s . '");
            imgView.style.backgroundImage = `url(${imgLink})`;
            imgView.textContent = "";
            imgView.style.border = 0;
        });

       document.getElementById("discardBtn3-' . $s . '").addEventListener("click", function(event) {
            let imgView = document.getElementById("img-view3-' . $s . '");
            let inputFIle3 = document.getElementById("input-file3-' . $s . '");
            imgView.style.backgroundImage = "";
            imgView.textContent = "Drag & drop or click here";
            imgView.style = "display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc; font-size:13px;";
            inputFIle3.value = "";
            event.preventDefault(); 
            });
    </script>
    ';
}
?>
                    </ul>
                </li>
                <!---ICONS 15 END--->
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="fa fa-font"></i><span> Texts Part 1</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu" style="padding:0px;">
                        <!--TEXT EDITORS START--->
                        <?php
$desciptionList = array(
    "Square Data 1", "Square Data 2", "Square Data 3", "About us description",
    "About point 1 header 1", "About point 1 content 1", "About point 2 header 2",
    "About point 2 content 2", "About point 3 header 3", "About point 3 content 3",
    "Blackbox title 1", "Blackbox num1", "Blackbox 2 title", "Blackbox num2", "Blackbox 3 title"
    , "Blackbox num3"
);
$primaryKeysOfDes1 = array("1","2","3","4","5","6","7","8",
"9","10","11","12","13","14","15","16");
for ($count = 0; $count < count($desciptionList); $count++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span>' . htmlspecialchars($desciptionList[$count]) . '</span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu" style="padding:15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <form action="textSender.php" method="post">
                        <label id="drop-area">
                            <textarea style=" 
                                width: 196px;
                                height: 150px;
                                border: 1px solid #ccc;
                                text-align: left;
                                vertical-align: top;
                                padding: 5px;
                                box-sizing: border-box;
                                resize: none;
                                font-family: Arial, sans-serif;
                                font-size: 14px;" placeholder="Start typing here..." name="textArea1" id="textArea1-'.$count.'"></textarea>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" name="textIploadButton1" value = "'.$primaryKeysOfDes1[$count].'" id="textIploadButton1-'.$count.'"
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'" 
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
                </form>
              </div>  
        </ul>
    </li>
    ';
}
?>

                        <!--TEXT EDITORS END--->
                    </ul>
                </li>
                
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="fa fa-font"></i><span> Texts Part 2</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu" style="padding:0px;">
                        <!--TEXT EDITORS START--->
                        <?php
$desciptionList = array(
    "Service 1 Description", "Service 1 point 1", "Service 1 point 2", "Service 1 point 3",
    "Service 2 Description", "Service 2 point 1", "Service 2 point 2",
    "Service 2 point 3", "Service 3 Description", "Service 3 point 1",
    "Service 3 point 2", "Service 3 point 3", "Service 4 Description", "Service 4 point 1", "Service 4 point 2"
    , "Service 4 point 3", "Brands Description"
);
$primaryKeysOfDes2 = array(
    "17", "18", "19", "20",
    "21", "22", "23",
    "24", "25", "26",
    "27", "28", "29", "30", "31"
    , "32", "33"
);
for ($count = 0; $count < count($desciptionList); $count++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span>' . htmlspecialchars($desciptionList[$count]) . '</span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu" style="padding:15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                     <form action="textSender2.php" method="post">
                        <label id="drop-area">
                            <textarea style=" 
                                width: 196px;
                                height: 150px;
                                border: 1px solid #ccc;
                                text-align: left;
                                vertical-align: top;
                                padding: 5px;
                                box-sizing: border-box;
                                resize: none;
                                font-family: Arial, sans-serif;
                                font-size: 14px;" placeholder="Start typing here..." name="textArea2" id="textArea2-'.$count.'"></textarea>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" name="textIploadButton2" value = "'.$primaryKeysOfDes2[$count].'" id="textIploadButton2-'.$count.'"
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'" 
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
                </form>
              </div>  
        </ul>
    </li>
    ';
}
?>
                        <!--TEXT EDITORS END--->
                    </ul>
                </li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="fa fa-font"></i><span> Texts Part 3</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu" style="padding:0px;">
                        <!--TEXT EDITORS START--->
                        <?php
$desciptionList = array(
    "Client name 1", "Client proffession 1", "Client description1",
     "Client name 2", "Client proffession 2", "Client description2",
     "Client name 3", "Client proffession 3", "Client description3",
      "Client name 4", "Client proffession 4", "Client description4",
     "news 1","Date","news 2","Date","news 3","Date","news 4","Date","News 5","Date","Privacy Policy"
);
$primaryKeysOfDes3 = array(
     "34", "35", "42",
     "36", "37", "43",
     "38", "39", "44",
      "40", "41", "45",
     "46", "47","48","49","50","51","52","53","54","55","56"
);
for ($count = 0; $count < count($desciptionList); $count++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span>' . htmlspecialchars($desciptionList[$count]) . '</span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu" style="padding:15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <form action="textSender3.php" method="post">
                        <label id="drop-area">
                            <textarea style=" 
                                width: 196px;
                                height: 150px;
                                border: 1px solid #ccc;
                                text-align: left;
                                vertical-align: top;
                                padding: 5px;
                                box-sizing: border-box;
                                resize: none;
                                font-family: Arial, sans-serif;
                                font-size: 14px;" placeholder="Start typing here..."name="textArea3" id="textArea3-'.$count.'"></textarea>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" name="textIploadButton3" value = "'.$primaryKeysOfDes3[$count].'" id="textIploadButton3-'.$count.'"
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'" 
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
                </form>
              </div>  
        </ul>
    </li>
    ';
}
?>
                      <!--TEXT EDITORS END--->
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="fa fa-font"></i><span> Headers</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu" style="padding:0px;">
                        <!--TEXT EDITORS START HEADERS--->
                        <?php
$desciptionList = array(
    "Small Main 1", "Small Main 2", "Lrge Main 1", "Lrge Main 2",
     "Background Header 1", "Background Header 2", "Background Header 3",
     "About header1", "About Main Header", "Services Header 1",
      "Services Header2", "Services Main Header1", "Services Main Header2",
     "Services Main Header3", "Services Main Header4","Brand Header","Customer header1"
     ,"Customer header2","News Header"
);
$headerPrimaryKeys = array(
    "1", "2", "3", "4",
     "5", "6", "7",
     "8", "9", "10",
      "11", "12", "13",
     "14", "15","16","17"
     ,"18","19"
);
for ($count = 0; $count < count($desciptionList); $count++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span>' . htmlspecialchars($desciptionList[$count]) . '</span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu" style="padding:15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                      <form action="textSender4.php" method="post">
                        <label id="drop-area">
                            <textarea style=" 
                                width: 196px;
                                height: 150px;
                                border: 1px solid #ccc;
                                text-align: left;
                                vertical-align: top;
                                padding: 5px;
                                box-sizing: border-box;
                                resize: none;
                                font-family: Arial, sans-serif;
                                font-size: 14px;" placeholder="Start typing here..." name="textArea4" id="textArea4-'.$count.'"></textarea>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" name="textIploadButton4" value = "'.$headerPrimaryKeys[$count].'" id="textIploadButton4-'.$count.'"
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'" 
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
                </form>
              </div>  
        </ul>
    </li>
    ';
}
?>
                      <!--TEXT EDITORS END--->
                    </ul>
                </li>
                <!--OTHERS START--->
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="fa fa-font"></i><span> Others</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu" style="padding:0px;">
                       <!--FIRST TREE BRANCH START-->
                        <li class="treeview">
                          <a class="waves-effect waves-dark" href="#!">
                              <span>About Page</span><i class="icon-arrow-down"></i>
                          </a>
                          <ul class="treeview-menu" style="padding:0px;">
                              <!---LOOP OF SUB SECTIONS-->
                              <!---ABOUT SECTION--->
                               <?php
                               $aboutPageRows = array("About org main section","About org main point","Image 1 info","Image 2 info","Image 3 info","Image 4 info","Image 5 info","Image 6 info","Vision box title","Vision box info","Mission box title"
                               ,"Mission box info");
                               $AboutPagePrimaryKeys = array("1","2","3","4","5","6","7","8","9","10","11"
                               ,"12");
                               for($h =0;$h<12;$h++){
                                echo '
                                <li class="treeview">
                                    <a class="waves-effect waves-dark" href="#!">
                                          <span>'.$aboutPageRows[$h].'</span><i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="treeview-menu" style="padding:15px;">
                                          <div class="container">
                                                   <div class="row">
                                                        <div class="col-md-12">
                                                        <form action="textSender5.php" method="post">
                                                             <label id="drop-area">
                                                                   <textarea style=" 
                                                                              width: 196px;
                                                                              height: 150px;
                                                                              border: 1px solid #ccc;
                                                                              text-align: left;
                                                                              vertical-align: top;
                                                                              padding: 5px;
                                                                              box-sizing: border-box;
                                                                              resize: none;
                                                                              font-family: Arial, sans-serif;
                                                                              font-size: 14px;" placeholder="Start typing here..."  name="textArea5" id="textArea5-'.$h.'"></textarea>
                                                             </label>
                                                        </div>
                                                   </div>
                                                   <div class="row">
                                                        <div class="col-md-12">       
                                                            <button class="button2"  name="textIploadButton5" value = "'.$AboutPagePrimaryKeys[$h].'" id="textIploadButton5-'.$h.'"
                                                                   style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                                                   onmouseover="this.style.backgroundColor=\'#006400\'" 
                                                                   onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                                                            </button>
                                                            <button class="button2" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                                                   onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                                                   onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                                                            </button>
                                                        </div>
                                                   </div>
                                                   </form>
                                            </div>  
                                    </ul>
                             </li>
                                ';
                               }
                               ?>
                          </ul>                          
                        </li>
                    <!--FIRST TREE BRANCH END-->
                    <!---SECOND TREE BRANCH START-->
                    <li class="treeview">
                          <a class="waves-effect waves-dark" href="#!">
                              <span>Services Page</span><i class="icon-arrow-down"></i>
                          </a>
                          <ul class="treeview-menu" style="padding:0px;">
                            <!--LOOP OF SERVICES SUBSECTION EDITING-->
                               <?php
                               $service_section_names = array("Service 1 image strip","Service 1 paragraph1","Service 1 paragraph2","Service 1 paragraph3","service 1 hover point","Service 2 image strip","Service 2 paragraph1","Service 2 paragraph2","Service 2 paragraph3","service 2 hover point","Service 3 image strip","Service 3 paragraph1","Service 3 paragraph2","Service 3 paragraph3","service 3 hover point"
                               ,"Service 4 image strip","Service 4 paragraph1","Service 4 paragraph2","Service 4 paragraph3","service 4 hover point");
                               $servicePrimaryKeys = array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15"
                               ,"16","17","18","19","20");
                               for($serviceCount = 0;$serviceCount<20;$serviceCount++){
                                echo '
                                <li class="treeview">
                                    <a class="waves-effect waves-dark" href="#!">
                                          <span>'.$service_section_names[$serviceCount].'</span><i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="treeview-menu" style="padding:15px;">
                                          <div class="container">
                                                   <div class="row">
                                                        <div class="col-md-12">
                                                        <form action="textSender6.php" method="post">
                                                             <label id="drop-area">
                                                                   <textarea style=" 
                                                                              width: 196px;
                                                                              height: 150px;
                                                                              border: 1px solid #ccc;
                                                                              text-align: left;
                                                                              vertical-align: top;
                                                                              padding: 5px;
                                                                              box-sizing: border-box;
                                                                              resize: none;
                                                                              font-family: Arial, sans-serif;
                                                                              font-size: 14px;" placeholder="Start typing here..." name="textArea6" id="textArea6-'.$serviceCount.'"></textarea>
                                                             </label>
                                                        </div>
                                                   </div>
                                                   <div class="row">
                                                        <div class="col-md-12">       
                                                            <button class="button2" name="textIploadButton6" value = "'.$servicePrimaryKeys[$serviceCount].'" id="textIploadButton6-'.$serviceCount.'"
                                                                   style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                                                   onmouseover="this.style.backgroundColor=\'#006400\'" 
                                                                   onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                                                            </button>
                                                            <button class="button2" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                                                   onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                                                   onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                                                            </button>
                                                        </div>
                                                   </div>
                                                   </form>
                                            </div>  
                                    </ul>
                             </li>
                                ';
                               }
                               ?>
                          </ul>
                        </li>
                        <!--SECOND TREE BRANCH END--->
                        <!--THIRD TREE BRANCH START--->
                        <li class="treeview">
                          <a class="waves-effect waves-dark" href="#!">
                              <span>Social Links</span><i class="icon-arrow-down"></i>
                          </a>
                          <ul class="treeview-menu" style="padding:0px;">
                              <?php
                              $socialLinkNames = array("Facebook","X Link","LinkedIn","Instagram");
                              $socialLinkPrimaryKeys = array("1","2","3","4");
                              for($socialLinkCount = 0;$socialLinkCount < 4;$socialLinkCount++){
                                echo '
                               <li class="treeview">
                                    <a class="waves-effect waves-dark" href="#!">
                                          <span>'.$socialLinkNames[$socialLinkCount].'</span><i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="treeview-menu" style="padding:15px;">
                                          <div class="container">
                                                   <div class="row">
                                                        <div class="col-md-12">
                                                        <form action="textSender7.php" method="post">
                                                             <label id="drop-area">
                                                                   <textarea style=" 
                                                                              width: 196px;
                                                                              height: 150px;
                                                                              border: 1px solid #ccc;
                                                                              text-align: left;
                                                                              vertical-align: top;
                                                                              padding: 5px;
                                                                              box-sizing: border-box;
                                                                              resize: none;
                                                                              font-family: Arial, sans-serif;
                                                                              font-size: 14px;" placeholder="Start typing here..." name="textArea7" id="textArea7-'.$socialLinkCount.'"></textarea>
                                                             </label>
                                                        </div>
                                                   </div>
                                                   <div class="row">
                                                        <div class="col-md-12">       
                                                            <button class="button2" name="textIploadButton7" value = "'.$socialLinkPrimaryKeys[$socialLinkCount].'" id="textIploadButton7-'.$socialLinkCount.'" 
                                                                   style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                                                   onmouseover="this.style.backgroundColor=\'#006400\'" 
                                                                   onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                                                            </button>
                                                            <button class="button2" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                                                   onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                                                   onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                                                            </button>
                                                        </div>
                                                   </div>
                                                   </form>
                                            </div>  
                                    </ul>
                             </li>
                              ';
                              }
                              ?>
                          </ul>
                        </li>
                        <!--THIRD TREE BRANCH END--->
                    </ul>
                </li>
                <!--OTHERS END--->
                <!--ORGANIZATION INFO START-->
                <li class="nav-level"><span style="color: white;">---</span> Extras</li>
                <li class="treeview">
                  <a id="showFormButton" class="waves-effect waves-dark" >
                      <i class="fa fa-building"></i><span> Organization Info</span>
                  </a>                
                </li>
              <li class="treeview">
                          <a class="waves-effect waves-dark" href="#!">
                          <i class="fa fa-store"></i><span>Marketplace</span><i class="icon-arrow-down"></i>
                          </a>
                          <ul class="treeview-menu">
                            <!--ADD START-->
                          <li class="treeview">
                                  <a id="showFormButton" href="addShopItems.php" class="waves-effect waves-dark" >
                                      <i></i><span> Add Items</span>
                                  </a>                
                          </li>
                          <!--ADD END-->
                          <!--ADD START-->
                          <li class="treeview">
                                  <a id="showFormButton" href="updateItems.php" class="waves-effect waves-dark" >
                                      <i></i><span> Update Items</span>
                                  </a>                
                          </li>
                          <!--ADD END-->
                            <!--ADD START-->
                            <li class="treeview">
                                  <a id="showFormButton" href="removeShopItems.php" class="waves-effect waves-dark" >
                                      <i></i><span> Remove Items</span>
                                  </a>                
                          </li>
                          <!--ADD END-->
                          </ul>
              </li>            
            <!--ORG INFO POP UP BOX START--->
            <div class="popup-overlay" id="popupOverlay"></div>
<div class="form-container" id="loginForm">
  <div class="logo-container">Organization Information</div>
  <form class="form" action="orgInfoUpdate.php" method="post">
    <div class="form-group">
      <label for="password">Basic</label>
      <input
        required
        placeholder="Organization Name (MAX characters-160)"
        name="orgName"
        id="orgName"
        type="text" maxlength="160"/>
        <label for="password"></label>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding-left:1px;">
                <input
        required
        placeholder="Address(Max-160)"
        name="address"
        id="address"
        type="text" maxLength="160"/>
                </div>
                <div class="col-md-6" style="padding:0px;">
                <input
        required
        placeholder="Email"
        name="mail"
        id="mail"
        type="email"/>
                </div>
            </div>
        </div>
        <label for="password">Open Hours</label>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding-left:1px;">
                <input
        required
        placeholder="Week days"
        name="weekDays"
        id="weekDays"
        type="text"/>
                </div>
                <div class="col-md-6" style="padding:0px;">
                <input
        required
        placeholder="Week end"
        name="weekEnd"
        id="weekEnd"
        type="text"/>
                </div>
            </div>
        </div>
        <!--PHONE & FAX-->
        <label for="password">Contact</label>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding-left:1px;">
                <input
        required
        placeholder="Phone (Max-15)"
        name="phone"
        id="phone"
        type="number" min="0" max="15"/>
                </div>
                <div class="col-md-6" style="padding:0px;">
                <input
        required
        placeholder="Fax (Max-140)"
        name="fax"
        id="fax"
        type="text" maxLength="140"/>
                </div>
            </div>
        </div>
        <!--BOX CONTENT END--> 
    </div>
    <button type="submit" class="form-submit-btn">Update</button>
  </form>
</div>
<!--ORG POP UP BOX END-->
<script>
    const showFormButton = document.getElementById('showFormButton');
    const popupOverlay = document.getElementById('popupOverlay');
    const loginForm = document.getElementById('loginForm');

    showFormButton.addEventListener('click', () => {
      popupOverlay.classList.add('active');
      loginForm.classList.add('active');
    });

    popupOverlay.addEventListener('click', () => {
      popupOverlay.classList.remove('active');
      loginForm.classList.remove('active');
    });
  </script>
              <!--ORGANIZATION INFO END-->
              <li class="nav-level"><span style="color: white;">---</span> Extras</li>
<!--
<li class="treeview">
                  <a class="waves-effect waves-dark" href="imageGenarator.php"  target="_blank">
                      <i class="fa fa-download"></i><span> Image Genarator</span>
                  </a>                
              </li>
              
              <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="fa fa-question-circle"></i><span> Lists</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span>SELECTIONS</span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <label>Enable list in about</label>     <input type="checkbox" style="margin-top:5px;"><br>
                        <label>Enable list in services</label>  <input type="checkbox" style="margin-top:1px;"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" 
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'" 
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
              </div>  
        </ul>
    </li>
                     
                    </ul>
                </li>              
-->
              <li class="treeview">
               <a class="waves-effect waves-dark" href="helpPage.php">
                   <i class="fa fa-question-circle"></i><span> Help</span>
               </a>                
           </li>
            </ul>
         </section>
      </aside>




      <div class="content-wrapper">
         <!--Table start-->
      <div class="container my-5"><br>
      <div class="scrollable-section">
      <h2 class="text-left mb-4">Specification Table</h2><br>
      <table class="" style="border-collapse: collapse;" border="1" cellspacing="0" cellpadding="13" width="100%">
        <tbody>
                    <?php
                    $query = "SELECT * FROM specifications WHERE shopItemID = {$moreInfoButton}";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                    $specificationRow = array("name"=>"","description"=>"");
                    $count = 0;
                    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                        $specificationRow["name"] = $row['name'];
                        $specificationRow["description"] = $row['description']; 
                        if($count == 0){

                        //}
                    //}
                     ?>
                <tr>
                    <th scope="row"><?php echo $specificationRow["name"]?></th>
                    <td><?php echo $specificationRow["description"]?></td>
                
                <?php $count = 1?>
                <?php } else{?>
                  <th scope="row"><?php echo $specificationRow["name"]?></th>
                  <td><?php echo $specificationRow["description"]?></td>
                  </tr>
                  <?php $count = 0?>
                  <?php }?>
                <?php }?>
            </tbody>
        </table>
         
        <br>
         <!--DELIVARY INFO START-->
         <?php
                    $query = "SELECT * FROM delivaryInfo WHERE shopItemID = {$moreInfoButton}";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                     ?>
      <div class="container my-5" style="padding:0px;">
        <div class="delivery-info-card p-4">
        <h2 class="mb-4 pe-3 me-3" style="padding-left:20px;">Delivery Information</h2>


            <ul class="list-group list-group-flush">
                    <?php
                     $itemRow3 = array("name"=>"","des"=>"");
                     $count2 = 0;
                     while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                         $itemRow3["name"] = $row['name'];
                         $itemRow3["des"] = $row['des'];
                         $count2++;
                     //}
                     ?> 
                     <li class="list-group-item d-flex align-items-center" style="background-color:#f8f9fa;">
                    <strong><?php echo $itemRow3["name"]?> <span style="color:#f8f9fa;">:</span> </strong>
                    <span class="ms-2"><?php echo $itemRow3["des"]?></span>
                </li>
                <?php }?> 
                <?php
                if($count2<1){

                //}
                ?> 
                <h5 style="text-align:center;">No Delivary Information</h5>
                <?php }?>   
            </ul>
        </div>
    </div><br>
      <!--DELIVARY INFO END--->
      <!--images start-->
      <div class="container-fluid mt-5">
    <style>
        /* General Container Styles */
        .image-container {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #f8f9fa; /* Light background for better contrast */
        }
        .image-container img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease;
        }
        .image-container:hover {
            transform: scale(1.05); /* Smooth zoom effect */
            box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2);
        }

        /* Row and Column Spacing */
        .row {
            margin-bottom: 10px; /* Adds gap between rows */
        }
        .col-md-3, .col-md-12 {
            padding: 5px; /* Adds space between columns */
        }

        /* Main Image Styles */
        #mainImage {
            border: 3px solid #007bff; /* Highlight main image */
            border-radius: 8px;
            display: flex;
    justify-content: center;
    align-items: center;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .col-md-3 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }
        @media (max-width: 576px) {
            .col-md-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-3">
            <div class="image-container">
                <a href="<?php echo "{$smallImageLink1}"?>" target="_blank"><img src="<?php echo "{$smallImageLink1}"?>" id="small1" alt="Thumbnail 1"></a>
            </div>
         
        </div>
        <!-- Column 2 -->
        <div class="col-md-3">
            <div class="image-container">
                <a href="<?php echo "{$smallImageLink2}"?>" target="_blank"><img src="<?php echo "{$smallImageLink2}"?>" id="small2" alt="Thumbnail 2"></a>
            </div>
           
        </div>
        <!-- Column 3 -->
        <div class="col-md-3">
            <div class="image-container">
                <a href="<?php echo "{$smallImageLink3}"?>" target="_blank"><img src="<?php echo "{$smallImageLink3}"?>" id="small3" alt="Thumbnail 3"></a>
            </div>
           
        </div>
        <!-- Column 4 -->
        <div class="col-md-3">
            <div class="image-container">
                <a href="<?php echo "{$smallImageLink4}"?>" target="_blank"><img src="<?php echo "{$smallImageLink4}"?>" id="small4" alt="Thumbnail 4"></a>
            </div>
            
        </div>
    </div>
    <!-- Main Image Row -->
    <div class="row">
        <div class="col-md-12" style="display:grid; place-items:center;">
            <div class="image-container" >
                <a href="<?php echo "{$mainImageLink}"?>" target="_blank"><img src="<?php echo "{$mainImageLink}"?>" id="mainImage" alt="Main Image"></a>
            </div>
        </div>
    </div>

    <!--images end-->
      <!--ADDITIONAL INFO START-->
      <?php
                    $query = "SELECT * FROM additional WHERE shopItemID = {$moreInfoButton}";
                    $getResults = sqlsrv_query($conn, $query);
                    if ($getResults === false) {
                        error_log(print_r(sqlsrv_errors(), true));
                        die("Query failed.");
                    }
                    $addInfo = "";
                    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                      $addInfo = $row['addInfo'];
                    }
                     ?>
  <div class="container my-5">
        <div class="delivery-info-card p-4">
            <h2 class=" text-center mb-4" style="padding:5px;">Additional Information</h2>
            <ul class="list-group list-group-flush">
                <p style="background-color:#f8f9fa;"><?php echo $addInfo?></p>
            </ul>
        </div>
    </div>
  <!--ADDITIONAL INFO END-->
      </div>
        
    </div>
      </div>


   <!-- Required Jqurey -->
   <script src="assets/plugins/Jquery/dist/jquery.min.js"></script>
   <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="assets/plugins/tether/dist/js/tether.min.js"></script>

   <!-- Required Fremwork -->
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

   <!-- Scrollbar JS-->
   <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   <script src="assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

   <!--classic JS-->
   <script src="assets/plugins/classie/classie.js"></script>

   <!-- notification -->
   <script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script>

   <!-- Sparkline charts -->
   <script src="assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

   <!-- Counter js  -->
   <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
   <script src="assets/plugins/countdown/js/jquery.counterup.js"></script>

   <!-- Echart js -->
   <script src="assets/plugins/charts/echarts/js/echarts-all.js"></script>

   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/highcharts-3d.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   <!-- custom js -->
   <script type="text/javascript" src="assets/js/main.min.js"></script>
   <script type="text/javascript" src="assets/pages/dashboard.js"></script>
   <script type="text/javascript" src="assets/pages/elements.js"></script>
   <script src="assets/js/menu.min.js"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>

</body>

</html>