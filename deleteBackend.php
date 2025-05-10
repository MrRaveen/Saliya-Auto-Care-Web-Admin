<?php
//T-SQL part start
$condition = 0;
$deleteID = $_POST['deleteID'];

require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

//MS AZURE & sql start
//azure blob img start

$productmanuals = "productmanuals";
$shopsmallimages = "shopsmallimages";
$shopimages = "shopimages";
$blobClient = BlobRestProxy::createBlobService($connectionString);
//azure blob img end
//details sql start
$deleteID = intval($deleteID);
$shopItemImage = "SELECT imgName FROM shopItems WHERE shopItemID = {$deleteID}";
$manualNametest = "SELECT name FROM manualNames WHERE shopItemID = {$deleteID}";
$sqlquery3 = "SELECT name FROM smallProductImg WHERE shopItemID = {$deleteID}";
$teststmt = sqlsrv_query($conn,$shopItemImage);
$teststmt2 = sqlsrv_query($conn,$manualNametest);
$teststmt3 = sqlsrv_query($conn,$sqlquery3);

while($row = sqlsrv_fetch_array($teststmt, SQLSRV_FETCH_ASSOC)){
    //echo "<script>alert('{$row['imgName']}');</script>";
    $shopItemimg = $row['imgName'];
}
while($row2 = sqlsrv_fetch_array($teststmt2, SQLSRV_FETCH_ASSOC)){
    //echo "<script>alert('{$row2['name']}');</script>";
    $manualName = $row2['name'];
}
$miniImages = array();
while($row3 = sqlsrv_fetch_array($teststmt3, SQLSRV_FETCH_ASSOC)){
    array_push($miniImages,$row3['name']);
}
//details sql end
//blob start delete
$count = 0;
try {
    $blobClient->deleteBlob($productmanuals, $manualName);
    $blobClient->deleteBlob($shopsmallimages, $miniImages[0]);
    $blobClient->deleteBlob($shopsmallimages, $miniImages[1]);
    $blobClient->deleteBlob($shopsmallimages, $miniImages[2]);
    $blobClient->deleteBlob($shopsmallimages, $miniImages[3]);
    $blobClient->deleteBlob($shopimages, $shopItemimg);
} catch (ServiceException $e) {
    echo "Error: " . $e->getMessage();
}
//blob start end
//MS AZURE end
$query2 = "DELETE FROM additional WHERE shopItemID = $deleteID";
$stmt2 = sqlsrv_query($conn,$query2);
$query3 = "DELETE FROM cusReview WHERE shopItemID = $deleteID";
$stmt3 = sqlsrv_query($conn,$query3);
$query4 = "DELETE FROM delivaryInfo WHERE shopItemID = $deleteID";
$stmt4 = sqlsrv_query($conn,$query4);
$query5 = "DELETE FROM smallProductImg WHERE shopItemID = $deleteID";
$stmt5 = sqlsrv_query($conn,$query5);
$query6 = "DELETE FROM specifications WHERE shopItemID = $deleteID";
$stmt6 = sqlsrv_query($conn,$query6);
$query7 = "DELETE FROM manualNames WHERE shopItemID = $deleteID";
$stmt7 = sqlsrv_query($conn,$query7);
$query1 = "DELETE FROM shopItems WHERE shopItemID = $deleteID";
$stmt1 = sqlsrv_query($conn,$query1);
if($stmt7 != false && $stmt2 != false && $stmt3 != false && $stmt4 != false && $stmt5 != false && $stmt6 != false && $stmt1 != false){
   //header('location:removeShopItems.php');
   $condition = 1;
}
else{
    echo "<script>alert('Operation could not be performed. Try again');</script>";
    $condition = 0;
    //header('location:removeShopItems.php');
}
//T-SQL part end*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operation Status</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
    <div class="container">
        <?php if ($condition === 1): ?>
            <div class="icon success">✔️</div>
            <h1 class="text-success">Item Deleted Successfully</h1>
            <p>The selected item has been permanently removed from the database.</p>
        <?php else: ?>
            <div class="icon error">❌</div>
            <h1 class="text-danger">Failed to Delete Item</h1>
            <p>We encountered an error processing your request. Please try again later.</p>
        <?php endif; ?>
        <form action="removeShopItems.php" method="post">
            <button type="submit" name="btn1" id="btn1" class="btn btn-primary">Go Back</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
