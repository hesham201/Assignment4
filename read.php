
<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json");
error_reporting(0);
if (isset($_GET['id']) && $_GET['id'] != "") {
    include 'db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `inventory` WHERE id=($id)";
    // $stmt = $conn->prepare("SELECT * FROM `inventory` WHERE id=?");
    // $stmt->bind_param("i", $id);


    $result = mysqli_query(
        $conn,
        $sql

    );
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $response_id = $row['id'];
        $response_name = $row['uname'];
        $response_quantity = $row['quantiy'];
        $response_price = $row['price'];
        $response_category = $row['category'];
        response($response_id, $response_name, $response_quantity, $response_price, $response_category);
        mysqli_close($conn);
    } else {
        response(NULL, NULL, 200, "No Record Found", "no");
    }
} else {
    response(NULL, NULL, 400, "Invalid Request", "no");
}

function response($response_id, $response_name, $response_quantity, $response_price, $response_category)
{
    $response['id'] = $response_id;
    $response['response_name'] = $response_name;
    $response['response_quantity'] = $response_quantity;
    $response['response_price'] = $response_price;
    $response['response_category'] = $response_category;

    $json_response = json_encode($response);
    echo $json_response;
}
