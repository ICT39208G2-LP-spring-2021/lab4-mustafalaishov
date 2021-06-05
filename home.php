<?php 

if(isset($_SESSION['loginUsername'])){
  echo $_SESSION['loginUsername'];
} else {
  include 'register.php';
}