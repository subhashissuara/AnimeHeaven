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
    <link rel="stylesheet" href="./css/register.css">
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
          <a class="button" href="./login.php">Sign In</a>
        </div>
      </div>
    </header>
    <!-- Header End -->
    <!-- Content Starts -->
    <div class="register-box">
      <form action="./handlers/registerHandler.php" method="POST" class="register-box-form">
        <h3 class="register-box-title">Register</h3>
        <div class="form-group">
          <label htmlFor="name">Name</label>
          <input type="text" name="name" id="name" placeholder="Enter your name" value="" required />
        </div>
        <div class="form-group">
          <label htmlFor="email">Email</label>
          <input type="email" name="email" id="email" placeholder="Email address" value="" required/>
        </div>
        <div class="form-group">
          <label htmlFor="password">Password</label>
          <input type="password" name="password" id="password" autoComplete="true" placeholder="Enter password" value="" required />
        </div>
        <div class="form-group">
          <label htmlFor="confirmpassword">Confirm Password</label>
          <input type="password" name="confirmpassword" id="confirmpassword" autoComplete="true" placeholder="Confirm password" value="" required />
        </div>
        <button type="submit" class="btn btn-primary" name="register_form">
          Register
        </button>

        <span class="register-box-subtext">
          Already have an account? <a href="./login.php"><b>Login</b></a>
        </span>
      </form>
    </div>
    <!-- Content Starts -->
    <!-- Footer Start -->
      <footer>
        <img src="./media/images/ah_logo.png">
        <h3> &copy; Made by <a href="https://www.subhashissuara.com/" target="_blank">Subhashis Suara</a> and <a href="https://github.com/AvinashKumarTiu" target="_blank">Avinash Kumar Tiu</a></h3>
      </footer>
    </div>
    <!-- Footer End -->
</body>
</html>