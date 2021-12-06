<?php
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION["username1"])) {
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
    $loggedin = $_SESSION["username1"];
    $shelter1 = '1';



$sql = " UPDATE post SET shelter1name = '$loggedin', shelter1 = '$shelter1' WHERE postID = '$postid' " ;

if ($conn->query($sql) === TRUE) {
    header('Location: homepage2.php');
    
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
