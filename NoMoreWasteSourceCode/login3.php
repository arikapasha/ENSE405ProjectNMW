<?php
    ini_set('display_errors', 1);

$validate = true;

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    $db = new mysqli("localhost", "root", "catfish9233", "nmw");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    $q = " SELECT * FROM drisign WHERE username2 = '$username' AND password2 = '$password' ";


       
    $r = $db->query($q);
    $row = $r->fetch_assoc();
    if($username != $row["username2"] && $password != $row["password2"])
    {
        $validate = false;
    }
    
    if($validate == true)
    {

        session_start();
        $_SESSION["username2"] = $row["username2"];
        header("Location: homepage3.php");
        $db->close();
        exit();
    }
    else
    {
       echo "The username/password combination was incorrect. Login failed.";
        $db->close();
    }


?>
