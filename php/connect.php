<?php
$user = 'root';
$password = 'root';
$db = 'hw4';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
	$link,
	$host,
	$user,
	$password,
	$db,
	$port
);

if (!$success) {
	die("Connect Error: " . mysqli_connect_error());
}
