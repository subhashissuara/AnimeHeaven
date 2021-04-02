<?php
    session_start();
    include '../db.php';

    // Store in DB
    $email =  $_POST['email'];
    $password =  $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    
    $result = $conn->query($sql);

    if(!$row = $result->fetch_assoc()) {
        echo "<script type='text/javascript'>alert(`Incorrect Email or Password! Please Try Again.\n{$conn -> error}`)</script>";
        echo '<script type="text/javascript">window.location.href="../login.php"</script>';
    }
    else {
        $_SESSION['uid'] = $row['uid'];
        $_SESSION['loggedinanimeheaven'] = true;
        header("Location: ../homepage.php");
    }
?>