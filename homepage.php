<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinanimeheaven']) && $_SESSION['loggedinanimeheaven'] == true)) {
        header("Location: ./login.php");
    }

    include './db.php';

    $genres = ["action", "romance", "family", "drama", "mystery"];
    $movies = [];

    foreach($genres as $genre) {
      $movies[$genre] = [];
      
      $sql = "SELECT * FROM movies WHERE movie_genre='$genre'";
      $db_results = $conn->query($sql);

      if(mysqli_num_rows($db_results) > 0) {
          while($row = $db_results -> fetch_assoc()) {
              array_push($movies[$genre], $row);
          }
          $movies = array_unique($movies, SORT_REGULAR);
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
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
  <div class="homepage-wrapper">
      <!-- Header Start -->
      <header class="site-header">
        <div class="wrapper site-header__wrapper">
          <div class="site-header__start">
            <a href="./homepage.php" class="brand"><img src="./media/images/ah_logo.png" alt="Logo"></a>
          </div>
          <div class="site-header__middle">
            <nav class="nav">
              <button class="nav__toggle" aria-expanded="false" type="button">
                <i class="fas fa-bars"></i>
              </button>
              <ul class="nav__wrapper">
                <li class="nav__item"><a href="./homepage.php">Home</a></li>
                <li class="nav__item"><a href="./search.php">Search</a></li>
                <li class="nav__item"><a href="./account.php">Account</a></li>
                <?php
                if (isset($_SESSION['uid'])) {
                  if ($_SESSION['uid'] == 1) {
                    echo '<li class="nav__item"><a href="./admin.php">Admin</a></li>';
                  }
                }
                ?>
              </ul>
            </nav>
          </div>
          <div class="site-header__end">
            <a class="button" href="./handlers/logoutHandler.php">Logout</a>
          </div>
        </div>
      </header>
      <!-- Header End -->
      <!-- Image Slider Start-->
      <div class="slider-wrapper">
        <h2>Upcoming Movies</h2>
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">    
                    <div class="slide first">
                        <img src="./media/upcoming/blackclover.jpeg" height="100%" width="100%" object-fit="cover" alt="">
                    </div>   
                    <div class="slide">
                        <img src="./media/upcoming/detective conan.png" height="100%" width="100%" object-fit="cover" alt="">
                    </div>
                    <div class="slide">
                        <img src="./media/upcoming/mha3.jpg" height="100%" width="100%" object-fit="cover" alt="">
                    </div>
                    <div class="slide">
                        <img src="./media/upcoming/josse.jpg" height="100%" width="100%" object-fit="cover" alt="">
                    </div>
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div> 
            </div>
        </div>
      </div>
      <!-- Image Slider End-->
      <!-- Genres Start -->
      <div class="genre-wrapper">
        <?php 
          foreach($movies as $genre => $content) {
            if(!empty($content)) {
              $movie_genre = ucwords($genre);
              echo "<div class=\"genre-heading\">
                      <h2>$movie_genre Genre</h2>
                    </div>";
              
              echo "<div class=\"genre-movies\">";
              foreach($content as $movie) {
                $mid = $movie['mid'];
                $movie_cover_path = $movie['movie_cover_path'];
                $movie_name = ucwords($movie['movie_name']);
                echo "<a href=\"./play.php?mid=$mid\">
                          <img src=\"$movie_cover_path\" alt=\"$movie_name\">
                    </a>";
              }
              echo "</div>"; 
            }
          }
        ?>
      </div>
      <!-- Genres End -->
      <!-- Footer Start -->
      <footer>
        <img src="./media/images/ah_logo.png">
        <h3> &copy; Made by <a href="https://www.subhashissuara.com/" target="_blank">Subhashis Suara</a> and <a href="https://github.com/AvinashKumarTiu" target="_blank">Avinash Kumar Tiu</a></h3>
      </footer>
    </div>
    <!-- Footer End -->
    <!-- JS Scripts -->
    <script src="./scripts/script.js"></script>
</body>
</html>