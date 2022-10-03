<?php
$hostname = "localhost";
$user = "root";
$pw = "";
$db_name = "prakweb_c_203040132_pw";

$dbcon = mysqli_connect($hostname, $user, $pw, $db_name);

if (!$dbcon) {
  die("Gagal Terhubung ke Database: " . mysqli_connect_error());
}

$sql = "SELECT * FROM buku";
$query = mysqli_query($dbcon, $sql);
