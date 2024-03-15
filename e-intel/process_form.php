<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'db_test'; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function encryptPassword($password) {
  return base64_encode($password); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $password = encryptPassword($_POST['password']);
  $email = $_POST['email'];
  $comment = $_POST['comment'];
  
  $sql = "INSERT INTO users (name, password, email, comment) VALUES ('$name', '$password', '$email', '$comment')";

  if ($conn->query($sql) === TRUE) {
    echo "Form submitted successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
