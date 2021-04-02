<?php
    session_start();

    // Change the upload limits in php.ini
    // ini_set('upload_max_filesize', '50M');
    // ini_set('post_max_size', '50M');
    // ini_set('max_input_time', 300);
    // ini_set('max_execution_time', 300);

    if (isset($_POST['admin_form'])) {
        include '../db.php';

        // File Targets
        $targetCover = "../media/covers/" . basename($_FILES['movie_cover']['name']);
        $targetMovie = "../media/movies/" . basename($_FILES['movie_file']['name']);

        // Store in DB
        $movie_name = strtolower($_POST['movie_name']);
        $movie_genre = strtolower($_POST['movie_genre']);
        $movie_cover_path = "media/covers/" . basename($_FILES['movie_cover']['name']);
        $movie_file_path = "media/movies/" . basename($_FILES['movie_file']['name']);

        $sql = "INSERT INTO movies(movie_name, movie_genre, movie_cover_path, movie_file_path) VALUES('$movie_name', '$movie_genre', '$movie_cover_path', '$movie_file_path')";

        $result = $conn -> query($sql);

        if ($result && move_uploaded_file($_FILES['movie_cover']['tmp_name'], $targetCover) && move_uploaded_file($_FILES['movie_file']['tmp_name'], $targetMovie)) {
            echo "<script type='text/javascript'>alert('Movie Added Successfully! Press OK to Redirect to Admin Page.')</script>";
            echo '<script type="text/javascript">window.location.href="../admin.php"</script>';
        }
        else {
            echo "<script type='text/javascript'>alert(`Error Uploading Movie! Press Try Again.\n{$conn -> error}`)</script>";            
            echo '<script type="text/javascript">window.location.href="../admin.php"</script>';
        }
    }
?>