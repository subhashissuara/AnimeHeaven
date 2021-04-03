<?php
    session_start();
    // Only Allow Logged In Users
    if (!(isset($_SESSION['loggedinanimeheaven']) && $_SESSION['loggedinanimeheaven'] == true)) {
        header("Location: ./login.php");
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
    <link rel="stylesheet" href="./css/account.css">
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
    <?php 
        include './db.php';
        $uid = $_SESSION['uid'];
        $sql = "SELECT * FROM users WHERE uid = $uid";
        $result = $conn -> query($sql);
        $user = $result -> fetch_assoc();
    ?>
    <div class="account-box">
      <form action="./handlers/accountHandler.php" method="POST" class="account-box-form">
        <h3 class="account-box-title">Update Details</h3>
        <div class="form-group">
          <label htmlFor="name">Name</label>
          <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo ucwords($user['name']) ?>" required />
        </div>
        <div class="form-group">
          <label htmlFor="email">Email</label>
          <input type="email" name="email" id="email" placeholder="Email address" value="<?php echo $user['email'] ?>" required/>
        </div>
        <div class="form-group">
          <label htmlFor="password">New Password</label>
          <input type="password" name="password" id="password" autoComplete="true" placeholder="Enter new password" value="<?php echo $user['password'] ?>" required />
        </div>
        <div class="form-group">
          <label htmlFor="confirmpassword">Confirm New Password</label>
          <input type="password" name="confirmpassword" id="confirmpassword" autoComplete="true" placeholder="Confirm new password" value="<?php echo $user['password'] ?>" required />
        </div>
        <button type="submit" class="btn btn-primary" name="account_form" value="Update">
          Update
        </button>
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