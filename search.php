<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinanimeheaven']) && $_SESSION['loggedinanimeheaven'] == true)) {
        header("Location: ./login.php");
    }

    // Search
    $resultFound = false;
    if(isset($_GET['q']) && isset($_GET['o'])) {
          include './db.php';
          $resultFound = false;

          $query = $_GET['q'];
          $option = $_GET['o'];

          $query_array = explode(" ", $query);
          
          $results = [];
          if($query != "") {
               foreach ($query_array as $sub_query) {
                    $sql = "SELECT * FROM movies WHERE $option LIKE '%$sub_query%'";

                    $db_results = $conn->query($sql);

                    if(mysqli_num_rows($db_results) <= 0) {
                         $resultFound = false;
                    }
                    else {
                         while($row = $db_results -> fetch_assoc()) {
                              array_push($results, $row);
                         }
                         $results = array_unique($results, SORT_REGULAR);
                         $resultFound = true;
                    }
               }
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
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
     <div class="search-wrapper">
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
          <!-- Content Starts -->
          <div class="wrap">
               <form action="" method="get" class="search">
                    <input type="search" class="search-box" name="q" placeholder="What are you looking for?">
                    <select name="o" class="search-option">
                    <option value="movie_name" selected>Name</option>
                    <option value="movie_genre">Genre</option>
                    </select>
                    <button type="submit" class="search-btn">
                    <i class="fa fa-search"></i>
                    </button>
                    </form>
               </div>
               <?php 
                    if(isset($_GET['q']) && isset($_GET['o'])) {
                         if($resultFound) {
                              echo "<div class=\"results-heading\">
                                        <h2>Search Results for $option \"$query\"</h2>
                                   </div>";
                              echo "<div class=\"results\">";
                              foreach ($results as $result) {
                                   $mid = $result['mid'];
                                   $movie_cover_path = $result['movie_cover_path'];
                                   $movie_name = ucwords($result['movie_name']);
                                   echo "<a href=\"./play.php?mid=$mid\">
                                             <img src=\"$movie_cover_path\" alt=\"$movie_name\" class=\"result\">
                                        </a>";
                              }
                              echo "</div>";
                         }
                         else {
                              echo "<div class=\"results-heading\">
                                        <h2>No Results Found for $option \"$query\"</h2>
                                   </div>";
                         }
                    }
               ?>
          <!-- Content Ends -->
          <!-- Footer Start -->
          <footer>
               <img src="./media/images/ah_logo.png">
               <h3> &copy; Made by <a href="https://www.subhashissuara.com/" target="_blank">Subhashis Suara</a> and <a href="https://github.com/AvinashKumarTiu" target="_blank">Avinash Kumar Tiu</a></h3>
          </footer>
          </div>
          <!-- Footer End -->
     </div>
    <!-- JS Scripts -->
    <script src="./scripts/script.js"></script>
</body>
</html>