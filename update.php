<?php
include 'db.php';

$id = $_POST['id'];
$make = $_POST['make'];
$model = $_POST['model'];
$color = $_POST['color'];

$sql = "UPDATE car1 SET make='$make', model='$model', color='$color' WHERE id='$id'";
mysqli_query($conn, $sql);

mysqli_close($conn);
