<?php
    
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: index.html");
        exit();
    }
    else {

    $servername = "localhost";
    $username = "root";
    $password = "catfish9233";
    $dbname = "nmw";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
        $username = $_SESSION["username"];
        $food = trim($_POST["food"]);
        $pickup = trim($_POST["pickup"]);
        $time = date('Y-m-d H:i:s');


    $sql = " INSERT INTO post (food, pickup, time, poster) VALUES ( '$food', '$pickup', '$time', '$username') " ;

    if ($conn->query($sql) === TRUE) {
        header('Location: homepage.php');
        
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    }

?>
