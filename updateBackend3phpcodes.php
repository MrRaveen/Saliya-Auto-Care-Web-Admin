<?php
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
//sql db start
require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
//needed values
$delivary_update_Btn = $_POST['delivary_update_Btn'];
$finishingbutton = $_POST['finishingbutton'];
$delivary_cat_name = $_POST['delivary_cat_name'];
$delivary_cat_des = $_POST['delivary_cat_des'];
$condition = 0;
if($delivary_update_Btn == null || $finishingbutton == null || $delivary_cat_name == null || $delivary_cat_des == null){
    $condition = 5;
}else{   
//query setup
$Delivary_update_query = "UPDATE delivaryInfo SET name = ?,des = ? WHERE delivaryID = ?";
$delivary_query_parameters = array($delivary_cat_name,$delivary_cat_des,$delivary_update_Btn);
$delivary_query_stmt = sqlsrv_query($conn,$Delivary_update_query,$delivary_query_parameters);
if($delivary_query_stmt == false){
    $condition = 0;
}else{
    $condition = 1;
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
        <?php elseif ($condition == 5):?>
            <div class="icon error">❌</div>
            <h1 class="text-danger">Failed to Update the Item</h1>
            <p>Enter the required data or re-enter the data.</p>
        <?php else: ?>
            <div class="icon error">❌</div>
            <h1 class="text-danger">Failed to Delete Item</h1>
            <p>We encountered an error processing your request. Please try again later.</p>
        <?php endif; ?>
        
        <form action="updateBackend3.php" method="post">
            <input hidden type="text" value="<?php echo "{$finishingbutton}"; ?>" name="finishingButton">
            <button type="submit" name="btn1" id="btn1" class="btn btn-primary">Previous</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>



