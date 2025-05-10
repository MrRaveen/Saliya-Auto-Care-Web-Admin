<?php
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 

$text = $_POST['textArea7'];
$id = $_POST['textIploadButton7'];
$message = "";
if($text != null && $id != null){
    $sql = "UPDATE socialLinks SET link = ? WHERE id = ?";
    $params = array($text,$id);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "<script>alert('Record updated successfully.');</script>";
    }
    $message = "Text Updated Successfuly";
    sqlsrv_free_stmt($stmt);
}else{
    $message = "Insert the required text or error when saving";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spike Admin Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
       body {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                url('garage1.jpg') no-repeat center center/cover;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

        .login-card {
            background: white;
            border-radius: 0px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            max-width: 900px;
            width: 100%;
            display: flex;
        }
        .left-section {
            background: url('garage2.jpg') no-repeat center;
            background-size: cover;
            border-radius: 10px 0 0 10px;
            width: 50%;
        }
        .right-section {
            padding: 40px;
            width: 50%;
        }
        .social-btn {
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            padding: 8px 15px;
            width: 100%;
        }
        .social-btn i {
            margin-right: 5px;
        }
        .social-btn-google {
            color: #de5246;
        }
        .social-btn-facebook {
            color: #3b5998;
        }
        .divider {
            margin: 20px 0;
            text-align: center;
            color: #aaa;
        }
        .form-control {
            font-size: 14px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .footer-link {
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <!-- Left Section with Image -->
    <div class="left-section">
        <!-- Background image is set in CSS -->
    </div>
    
    <!-- Right Section with Form -->
    <div class="right-section">
        <div class="text-center mb-4">
            <h3><?php echo "{$message}";?></h3>
    </div>
            <a href="mainMenu001.php" class="btn btn-primary btn-block">Go Back</a>
        <!-- Footer Links -->
        <div class="text-center mt-3">
            <span class="text-muted">2024 Quad Code Crafters</span>
            <a href="#" class="text-primary footer-link">All rights recieved</a>
        </div>
    </div>
</div>

<!-- Bootstrap and FontAwesome -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
