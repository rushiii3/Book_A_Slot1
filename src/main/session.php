<?php
session_start();
if(!isset($_SESSION["user_email"]) )
{
  echo("<script>window.location='sign_in.php';</script>");
}
else{
  $user_email = $_SESSION["user_email"];
  $user_name = $_SESSION["user_full_name"];
}
?>