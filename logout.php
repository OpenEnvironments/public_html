<?php
session_start();
session_destroy();
unset($_SESSION['OEmember_name']);
header('Location: index.php');
?>