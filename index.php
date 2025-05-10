<?php
require_once 'blobStorageCon.php'; //blob storage connection
require_once 'sqlConnection.php'; //sql connection 
require 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
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
            <h3>Saliya Auto Care Web Editor</h3>
            <p class="text-muted">LogIn to continue</p>
        </div>
        
        <!-- Login Form -->
        <form action="loginProcess.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control"  name = "name" id="name" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter password">
            </div>
            <button class="btn btn-primary btn-block">Sign in</button>
        </form>
        
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