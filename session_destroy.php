<?php
session_start();
 session_destroy();
 session_unset();
//  print_r($_SESSION);
 header("Location: signin.php");