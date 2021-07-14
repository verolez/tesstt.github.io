<?php 
  $usersession = 0;
  if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $usersession = 1;
  }
 ?>