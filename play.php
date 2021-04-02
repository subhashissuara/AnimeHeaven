<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinanimeheaven']) && $_SESSION['loggedinanimeheaven'] == true)) {
        header("Location: ./login.php");
    }

    if(isset($_GET['mid'])) {
        include './db.php';

        $mid = $_GET['mid'];

        $sql = "SELECT * from movies WHERE mid = '$mid'";
        $result = $conn->query($sql);

        if(!$movie = $result->fetch_assoc()) {
            echo "No movie found with mid $mid";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimeHeaven</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/ah_logo.png"/>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/play.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
    <!-- Video Player Starts -->
    <?php 
        $movie_file_path = $movie['movie_file_path'];
        echo "<div class=\"video-player\">
                <video controls autoplay fullscreen>
                    <source src=\"$movie_file_path\" type='video/mp4'>
                </video>
            </div>";
    ?>
    <!-- Video Player Ends -->
</body>
</html>