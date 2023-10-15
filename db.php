<?php

$host = 'localhost';
$username = 'root';
$password = 'Weak#1';
$database = 'mages';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}
