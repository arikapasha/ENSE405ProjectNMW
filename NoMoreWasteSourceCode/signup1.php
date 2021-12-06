<?php
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
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $busname = trim($_POST["busname"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);
    $manager = trim($_POST["name"]);
    $file = $_FILES['file'];
    $foodpic = $_FILES['foodpic'];

    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('jpg', 'png', 'pdf');
    
    if(in_array($fileActualExt, $allowed)){
        if($fileError===0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDest = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDest);
                
            } else {
                echo "too big";

            }
            
        }else{
            echo "error uploading";
            }
    } else{
        echo "cannot upload file";
    }
    
    $fileName1 = $_FILES['foodpic']['name'];
    $fileTmpName1 = $_FILES['foodpic']['tmp_name'];
    $fileSize1 = $_FILES['foodpic']['size'];
    $fileError1 = $_FILES['foodpic']['error'];
    $fileType1 = $_FILES['foodpic']['type'];
    
    $fileExt1 = explode('.', $fileName1);
    $fileActualExt1 = strtolower(end($fileExt1));
    
    $allowed1 = array('jpg', 'png', 'pdf');
    
    if(in_array($fileActualExt1, $allowed1)){
        if($fileError1===0){
            if($fileSize1 < 1000000){
                $fileNameNew1 = uniqid('', true).".".$fileActualExt1;
                $fileDest1 = 'uploads/'.$fileNameNew1;
                move_uploaded_file($fileTmpName1, $fileDest1);
                
            } else {
                echo "too big";

            }
            
        }else{
            echo "error uploading";
            }
    } else{
        echo "cannot upload file";
    }

$sql = " INSERT INTO bussign (username, password, address, busname, phone, manager, profile, foodpic) VALUES ( '$username', '$password', '$address', '$busname', '$phone', '$manager', '$fileDest', '$fileDest1') " ;

if ($conn->query($sql) === TRUE) {
    header('Location: login.html');
    
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
