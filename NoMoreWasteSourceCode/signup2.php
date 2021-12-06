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
    $orgname = trim($_POST["organization"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);
    

$sql = " INSERT INTO orgsign (username1, password1, address1, orgname, phone1) VALUES ( '$username', '$password', '$address', '$orgname', '$phone') " ;

if ($conn->query($sql) === TRUE) {
    header('Location: login2.html');
    
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
