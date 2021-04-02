<?php
    session_start();
    include '../db.php';

    // Store in DB
    $name = strtolower($_POST['name']);
    $email =  $_POST['email'];
    $password =  $_POST['password'];

    $sql = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";
    
    $result = $conn -> query($sql);

    if (!$result) {
        echo "<script type='text/javascript'>alert(`Registration Unsuccessful! Please Try Again.\n{$conn -> error}`)</script>";
    }
    else {
        echo '<script type="text/javascript">alert("Registration Successful! Press OK to Redirect to Login Page."); window.location.href="../login.php"</script>';
    }
?>