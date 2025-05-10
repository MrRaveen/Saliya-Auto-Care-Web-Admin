<?php
require_once 'blobStorageCon.php'; // blob storage connection
require_once 'sqlConnection.php'; // sql connection 
require 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

$containerName = "images";
$blobClient = BlobRestProxy::createBlobService($connectionString);
$message = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['uploadbutton3'])) {
    $btnValue = $_POST['uploadbutton3'];
    
    // Check if a file was uploaded
    if (isset($_FILES['imageInput3']) && $_FILES['imageInput3']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['imageInput3'];
        
        // Validate file type (you may want to adjust allowed types)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($file['type'], $allowedTypes)) {
            $file['name'] = $btnValue; // Rename file
            
            // Open file
            $content = fopen($file['tmp_name'], "r");
            
            if ($content) {
                // Try to delete existing blob
                try {
                    $blobClient->deleteBlob($containerName, $btnValue);
                    // Existing image deleted successfully (if it existed)
                } catch (ServiceException $e) {
                    // Ignore if blob doesn't exist
                }

                // Try to upload new image
                try {
                    $blobClient->createBlockBlob($containerName, $file['name'], $content);
                    $message = "Image uploaded successfully.";
                } catch (ServiceException $e) {
                    $message = "Error uploading image: " . $e->getMessage();
                }

                // Close the file handle
                fclose($content);
            } else {
                $message = "Error opening the uploaded file.";
            }
        } else {
            $message = "Invalid file type. Please upload a JPEG, PNG, or GIF image.";
        }
    } else {
        $message = "No file was uploaded or an error occurred during upload.";
    }
} else {
    $message = "Invalid request method or missing upload button.";
}

// Output message (you might want to handle this differently based on your application's needs)
//echo $message;
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


