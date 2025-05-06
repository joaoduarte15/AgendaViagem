<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../pages/index.php"); 
    exit();
}
?>
