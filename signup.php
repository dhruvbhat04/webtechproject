<?php

// $server="localhost";
// $username="root";
// $password="";
// $dbname="qelogintable";
// $con = mysqli_connect($server,$username,$password,$dbname);
// if(!$con)
// {
//     echo "not connected!";
// }











// include "connect.php";

// $name= $_POST['fullname'];
// $email= $_POST['email'];
// $mobileno= $_POST['mobile'];
// $password= $_POST['password'];

//     $stmt=$conn->prepare("insert into student(name,email,mobileno,password)
//     values('$name','$email','$mobileno','$password')");
//     // $stmt->bind_param("sssssi",$name,$email,$mobileno,$password);
//     $stmt->execute();
//     echo "registration successful...";
//     $stmt->close();
//     $conn->close();



include "connect.php"; // your database connection

// Get form data
$name = $_POST['fullname'];
$email = $_POST['email'];
$mobileno = $_POST['mobile'];
$password = (int)$_POST['password']; // convert password to integer

// Check if email already exists
$stmt = $conn->prepare("SELECT id FROM student WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Email already registered. Try logging in.";
} else {
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO student(name,email,mobileno,password) VALUES(?,?,?,?)");
    $stmt->bind_param("sssi", $name, $email, $mobileno, $password); // last "i" for integer
    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();













?>