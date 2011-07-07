<?php
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
} else {
	require('header.php');
	require('main.php');
	require('sidebar.php');
	require('footer.php');
	}
?>