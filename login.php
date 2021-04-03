<?php
    session_start();
    if (isset($_SESSION['loggedinanimeheaven']) && $_SESSION['loggedinanimeheaven'] == true) {
        header("Location: ./homepage.php");
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
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
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
            </ul>
          </nav>
        </div>
        <div class="site-header__end">
          <a class="button" href="./register.php">Sign Up</a>
        </div>
      </div>
    </header>
    <!-- Header End -->
    <!-- Content Starts -->
    <div class="login-box">
      <form action="./handlers/loginHandler.php" method="POST" class="login-box-form">
        <h2 class="login-box-title">Login</h2>
        <div class="form-group">
          <label htmlFor="email">Email</label>
          <input type="email" name="email" id="email" placeholder="Email address" value="" required/>
        </div>
        <div class="form-group">
          <label htmlFor="password">Password</label>
          <input type="password" name="password" id="password" autoComplete="true" placeholder="Enter your password" value="" required />
        </div>
        <button type="submit" class="btn btn-primary" name="login_form">
          Login
        </button>

        <span class="login-box-subtext">
          Don't have an account? <a href="./register.php"><b>Register</b></a>
        </span>
      </form>
    </div>
    <!-- Content Ends -->
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