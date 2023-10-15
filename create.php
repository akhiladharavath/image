<?php
include 'db.php';

$make = $_POST['make'];
$model = $_POST['model'];
$color = $_POST['color'];
$image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];
$upload_dir = 'images/';

move_uploaded_file($image_temp, $upload_dir . $image);

$sql = "INSERT INTO car1 (make, model, color, image) VALUES ('$make', '$model', '$color', '$upload_dir$image')";
mysqli_query($conn, $sql);

mysqli_close($conn);

