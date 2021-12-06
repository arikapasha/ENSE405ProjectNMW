<?php

$validate = true;

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    $db = new mysqli("localhost", "root", "", "nmw");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    $q = " SELECT * FROM orgsign WHERE username1 = '$username' AND password1 = '$password' ";


       
    $r = $db->query($q);
    $row = $r->fetch_assoc();
    if($username != $row["username1"] && $password != $row["password1"])
    {
        $validate = false;
    }
    
    if($validate == true)
    {

        session_start();
        $_SESSION["username1"] = $row["username1"];
        header("Location: homepage2.php");
        $db->close();
        exit();
    }
    else
    {
       echo "The username/password combination was incorrect. Login failed.";
        $db->close();
    }


?>
