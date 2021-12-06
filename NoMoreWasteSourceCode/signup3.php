<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nmw";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $name = trim($_POST["drivername"]);
    $phone = trim($_POST["phone"]);

$sql = " INSERT INTO drisign (username2, password2, name, phone2) VALUES ( '$username', '$password', '$name', '$phone') " ;

if ($conn->query($sql) === TRUE) {
    header('Location: login3.html');
    
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
