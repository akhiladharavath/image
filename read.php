<?php
include 'db.php';

$search = isset($_POST['search']) ? $_POST['search'] : '';
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$limit = 3;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM car1 WHERE make LIKE '%$search%' OR model LIKE '%$search%' OR color LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

$output = '';

if (mysqli_num_rows($result) > 0) {
    $output .= '<table class="table w-75" >';
    $output .= '<thead><tr><th>ID</th><th>Make</th><th>Model</th><th>Color</th><th>Image</th><th>Actions</th></tr></thead>';
    $output .= '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        $output .= '<td class="car-id">' . $row['id'] . '</td>';
        $output .= '<td class="car-make">' . $row['make'] . '</td>';
        $output .= '<td class="car-model">' . $row['model'] . '</td>';
        $output .= '<td class="car-color">' . $row['color'] . '</td>';
        $output .= '<td><img class="car-image" src="' . $row['image'] . '" width="100" height="100"></td>';
        $output .= '<td class="actions"><button class="btn btn-primary edit-btn">Edit</button> <button class="btn btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button></td>';
        
        
        $output .= '</tr>';
    }

    $output .= '</tbody></table>';
} else {
    $output .= '<p>No car records found.</p>';
}

echo $output;
$sql = "SELECT COUNT(*) AS total FROM car1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row['total'] / $limit);


echo '<div class="pagination">';
for ($i = 1; $i <= $total_pages; $i++) {
    echo '<span class="pagination_link" data-page="' . $i . '">' . $i . '</span>';
}
echo '</div>';
mysqli_close($conn);





