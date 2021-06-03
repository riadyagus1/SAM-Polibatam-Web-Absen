<?php
session_start();
//unset($_SESSION['username']);
//unset($_SESSION['login']);
$_SESSION = [];
session_unset();
session_destroy();
header("Location:index.php");
exit;
?>