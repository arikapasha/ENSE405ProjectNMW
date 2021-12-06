<?php

$validate = true;

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    $db = new mysqli("localhost", "root", "", "nmw");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    $q = " SELECT * FROM bussign WHERE username = '$username' AND password = '$password' ";


       
    $r = $db->query($q);
    $row = $r->fetch_assoc();
    if($username != $row["username"] && $password != $row["password"])
    {
        $validate = false;
    }
    
    if($validate == true)
    {

        session_start();
        $_SESSION["username"] = $row["username"];
        header("Location: homepage.php");
        $db->close();
        exit();
    }
    else
    {
       echo "The username/password combination was incorrect. Login failed.";
        $db->close();
    }


?>
