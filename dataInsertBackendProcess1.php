<?php

require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
require_once 'sqlConnection.php'; // SQL connection 
require_once 'blobStorageCon.php'; //blob storage connection
$blobClient = BlobRestProxy::createBlobService($connectionString);
$containerName = "shopimages";
$condition = 0;

// Collect form data safely
$Price = $_POST['Price'];
$Item_Name = $_POST['Item_Name'];
$Long_Name = $_POST['Long_Name'];
$Description_1 = $_POST['Description_1'];
$Description_2 = $_POST['Description_2'];
$Brand_Name = $_POST['Brand_Name'];
$Address = $_POST['Address'];
$Type = $_POST['Type'];
$image = $_FILES['productImage'];
$Product_Link = $_POST['Product_Link'];

// Check for file upload errors
if ($image['error'] !== UPLOAD_ERR_OK) {
    die("File upload error: " . $image['error']);
}

// Insert into database
$sql = "INSERT INTO shopItems (itemName,price,imgName,longName,des1,des2,brandIconName,address,type,productLink) 
        VALUES (?,?,?,?,?,?,?,?,?,?)";
$params = array($Item_Name, $Price, $image['name'], $Long_Name, $Description_1, $Description_2, $Brand_Name, $Address, $Type, $Product_Link);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $condition++;
}

sqlsrv_free_stmt($stmt);

// Upload to Azure Blob Storage
$content = fopen($image['tmp_name'], "rb");
try {
    $blobClient->createBlockBlob($containerName, $image['name'], $content);
    $condition++;
} catch (ServiceException $e) {
    echo "Blob Storage Error: " . $e->getCode() . " - " . $e->getMessage();
}

if ($condition == 2) {
    header('location:addSpecifications.php');
    exit();
} else {
    echo "Error occurred during upload.";
}

?>
