<?php
// include "connect.php";

// $email = $_POST['email'];
// $password = $_POST['password'];


// $stmt = $conn->prepare("SELECT password, name FROM student WHERE email=?");
// $stmt->bind_param("s", $email);
// $stmt->execute();
// $stmt->store_result();

// if ($stmt->num_rows > 0) {
//     $stmt->bind_result($db_password, $name);
//     $stmt->fetch();

//     if ($password === $db_password) {
//         echo "Welcome, " . $name . "! You are successfully logged in.";
        
//     } else {
//         echo "Incorrect password. Try again.";
//     }
// } else {
//     echo "Email not found. You need to sign up first.";
// }

// $stmt->close();
// $conn->close();





include "connect.php"; // database connection

// Get form data
$email = $_POST['email'];
$password = (int)$_POST['password']; // convert password input to integer

// Check if email exists
$stmt = $conn->prepare("SELECT password, name FROM student WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($db_password, $name);
    $stmt->fetch();

    // Compare integer passwords
    if ($password === (int)$db_password) {
        echo "Welcome, " . $name . "! You are successfully logged in.";
        // You can start a session here and redirect to dashboard if needed
        // Example:
        // session_start();
        // $_SESSION['user'] = $name;
        // header("Location: dashboard.php");
    } else {
        echo "Incorrect password. Try again.";
    }
} else {
    echo "Email not found. You need to sign up first.";
}

$stmt->close();
$conn->close();



















?>
