<?php
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION["username2"])) {
    header("Location: index.html");
    exit();
}
else{
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
    $postid = $_GET['pid'];
    $loggedin = $_SESSION["username2"];
    $driver = '1';
    $status = 'Driver Selected';




$sql = " UPDATE post SET drivername = '$loggedin', driverselected = '$driver', status = '$status' WHERE postID = '$postid' " ;

if ($conn->query($sql) === TRUE) {
    header('Location: homepage3.php');
    
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
