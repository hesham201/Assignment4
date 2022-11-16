
<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json");
// error_reporting(0);
header('Access-Control-Allow-Methods: POST');
$data = json_decode(file_get_contents("php://input"), true);
include "db.php";
if (!empty($data['name'])) {
    $name = $data['name'];
} else {
    $name = '';
}
if (!empty($data['quantity'])) {
    $quantity = $data['quantity'];
} else {
    $quantity = 0;
}
if (!empty($data['price'])) {
    $price = $data['price'];
} else {
    $price = 0;
}
if (!empty($data['category'])) {
    $category = $data['category'];
} else {
    $category = 'roti';
}
$sql = "insert into inventory (uname, price, quantiy, category) values ('$name', '$price', '$quantity','$category')";
if (mysqli_query($conn, $sql)) {
    echo json_encode(['msg' => 'Data Inserted Successfully!', 'status' => true]);
} else {
    echo json_encode(['msg' => 'Data Failed to be Inserted!', 'status' => false]);
}
?>