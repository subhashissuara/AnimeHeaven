<?php
  $conn = new mysqli("localhost", "root", "", "animeheaven");
  if($conn -> connect_error) {
      die("Connection failed: " . $conn -> connect_error);
   }
?>