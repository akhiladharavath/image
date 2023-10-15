<?php
include 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM car1 WHERE id='$id'";
mysqli_query($conn, $sql);

mysqli_close($conn);

