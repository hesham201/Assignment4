
<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json");
header('Access-Control-Allow-Methods: POST');
// error_reporting(0);
// header('Access-Control-Allow-Methods: POST');
$data = json_decode(file_get_contents("php://input"), true);
include 'db.php';
$sid = $data['id'];
if (array_key_exists("name", $data)) {
    $name = $data['name'];
    $sql = "UPDATE inventory SET uname='$name' where id = '$sid'";
}
if (array_key_exists("price", $data)) {
    $price = $data['price'];
    $sql = "UPDATE inventory SET price='$price' where id = '$sid'";
}
if (array_key_exists("quantity", $data)) {
    $quantity = $data['quantity'];
    $sql = "UPDATE inventory SET quantiy='$quantity' where id = '$sid'";
}
if (array_key_exists("category", $data)) {
    $category = $data['category'];
    $sql = "UPDATE inventory SET category='$category' where id = '$sid'";
}

if (mysqli_query($conn, $sql)) {
    echo json_encode(['msg' => 'Data updates Successfully!', 'status' => true]);
} else {
    echo json_encode(['msg' => 'Data Failed to be Inserted!', 'status' => false]);
}
?>