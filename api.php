<?php
header('Content-Type: application/json');




$host = 'localhost';
$username = 'root';
$password = '';
$database = 'test';
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$name = $_POST['name'];
$gender = $_POST['gender'];
$doctors= $_POST['doctors'];
$phone = $_POST['phone'];

$sql = "INSERT INTO users (name,gender, doctors	, phone) VALUES ('$name','$gender', '$doctors', '$phone')";
if (mysqli_query($conn, $sql)) {
    $response = array('status' => 'success', 'message' => 'Data inserted successfully');
} else {
    $response = array('status' => 'error', 'message' => 'Error inserting data');
}

echo json_encode($response);

mysqli_close($conn);
?>



