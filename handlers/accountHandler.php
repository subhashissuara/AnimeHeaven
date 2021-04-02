<?php
    session_start();
    include '../db.php';

    // Update in DB
    $uid = $_SESSION['uid'];
    $name = strtolower($_POST['name']);
    $email =  $_POST['email'];
    $password =  $_POST['password'];

    $sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE uid='$uid'";
    
    $result = $conn -> query($sql);

    if (!$result) {
        echo "<script type='text/javascript'>alert(`Updation of User Details Unsuccessful! Please Try Again.\n{$conn -> error}`)</script>";
    }
    else {
        echo '<script type="text/javascript">alert("Updation of User Details Successful! Press OK to Redirect to Account Page."); window.location.href="../account.php"</script>';
    }
?>