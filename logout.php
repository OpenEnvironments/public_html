<?php
session_start();
session_destroy();
unset($_SESSION['OEuser']);
header('location: index.php');
?>