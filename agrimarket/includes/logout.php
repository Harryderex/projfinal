<?php
ob_start();
session_start();
if(isset($_SESSION['user_id'])) {
	session_destroy();
	unset($_SESSION['user_name']);
	unset($_SESSION['user_email']);
	header("Location: /agrimarket/login.php");
} else {
	header("Location: /agrimarket/login.php");
}
?>	