<?php
include "connect.php";

// Database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qelogintable";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die(json_encode([
        "status" => "error",
        "message" => "Database connection failed"
    ]));
}

// Get JSON data from frontend
$data = json_decode(file_get_contents("php://input"), true);

$name = mysqli_real_escape_string($conn, $data['name']);
$email = mysqli_real_escape_string($conn, $data['email']);
$card = mysqli_real_escape_string($conn, $data['card']);
$total = intval($data['total']);
$items = mysqli_real_escape_string($conn, json_encode($data['items'])); // JSON string

// Insert data into database
$sql = "INSERT INTO payments (name, email, cardnumber, cartitems, totalamount) 
        VALUES ('$name', '$email', '$card', '$items', '$total')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);
}

mysqli_close($conn);
?>
