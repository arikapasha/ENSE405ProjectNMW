<?php
ini_set('display_errors', 1);
    session_start();
    if (!isset($_SESSION["username2"])) {
        header("Location: index.html");
        exit();
    }
    else {
 //connection to db
    $servername = "localhost";
    $username = "root";
    $password = "catfish9233";
    $dbname = "nmw";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $loggedin = $_SESSION["username2"];
    $sid = $_GET['sid'];


$q = " SELECT * FROM orgsign WHERE username1 = '$sid' ";

        $result = $conn->query($q);

        }
?>


<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link  rel="stylesheet" href="style2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
<div class = "wrapper1">
<a href = "post.html"><button type="button" id = "but10"> Logged in as: <?php echo $_SESSION['username2'];?> </button></a>
<br><br><br><br><br><br>



<h2 class = "title">Organization Information </h2><br><br><br><br><br>
<section>
<div class = "d2">

<?php
    while($row = $result->fetch_assoc()){
    ?>

  <div class="flex-container">


    
    <div style="display:inline-block;"><br>
<div><h2><b> Organization Username: <?=$row['username1']?></b></h2></div><br>
<div><h2><b> Organization Name: <?=$row['orgname']?></b></h2></div><br>
<div><h2><b> Organization Address: <?=$row['address1']?></b></h2></div><br>
<div><h2><b> Organization Phone: <?=$row['phone1']?></b></h2></div>

    </div>



</div>





<?php
}
$conn->close();
?>
</div>

</section>

 <br>    <br>
    <br> <br>    <br>
    <br> <br>    <br>
    <br>
 
    </div>

    </div>

</body>
</html>



