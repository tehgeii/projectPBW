<?php
date_default_timezone_set('Asia/Jakarta');

$servername = "localhost";
$username = "ensawirm_wuwa";
$password = "Dafihauzantechgam9play";
$db = "ensawirm_wuwa";

$conn = new mysqli($servername,$username,$password,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully<hr>";
?>