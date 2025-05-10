<?php
$connection = mysqli_connect("localhost", "root", "raveen007", "posdb");

if (!$connection) {
    die("Could not connect: " . mysqli_connect_error());
} else {
    $userName = $_POST['name'];
    $pass = $_POST['pass'];
    if($userName == "" || $pass == ""){
        echo "<script>alert('Enter user credentials');
        window.location.href = 'index.php';
        </script>";
    }else{
        // Use a prepared statement to prevent SQL injection
    $query = "SELECT username, password_hash FROM admin_credentials WHERE username = ? AND password_hash = ?";
    
    $stmt = mysqli_prepare($connection, $query);
    
    if ($stmt) {
        // Bind parameters (assuming NationalIdentificationNumber is a string and Name is also a string)
        mysqli_stmt_bind_param($stmt, "ss", $userName, $pass);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch data
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // If user exists, redirect to main menu
            header("Location: mainMenu001.php");
            exit();
        } else {
            // If user does not exist, redirect back to login page
            echo "<script>alert('Invalid user credentials');
            window.location.href = 'index.php';
            </script>";
            //header("Location: index.php");
            exit();
        }
    } else {
        echo "Failed to prepare the SQL statement.";
    }

    // Close the connection
    mysqli_close($connection);
    }
    
}
?>
