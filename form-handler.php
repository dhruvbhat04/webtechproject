<?php

include "connect.php";


// Database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qelogintable";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Insert query
$sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "<h2 style='text-align:center; color:green;'>Message Sent Successfully!</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();







// $name = $_POST['name'];
// $visitor_email = $_POST['email'];
// $subject = $_POST['subject'];
// $message = $_POST['message'];

// $email_from = 'dag05464@gmail.com';
// $email_subject = 'New Form Submission';

// $email_body = "User Name: $name\n".
//               "User Email: $visitor_email\n".
//               "Subject: $subject\n".
//               "Message: $message\n";

// $to = 'dhruvnakshatra4@gmail.com';

// $headers = "From: $email_from\r\n";
// $headers .= "Reply-To: $visitor_email\r\n";
// $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// mail($to, $email_subject, $email_body, $headers);

// header("Location: contact.html");
// exit();
?>
