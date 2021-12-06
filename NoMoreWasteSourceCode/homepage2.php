<?php
ini_set('display_errors', 1);
    session_start();
    if (!isset($_SESSION["username1"])) {
        header("Location: index.html");
        exit();
    }
    else {
 //connection to db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nmw";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $loggedin = $_SESSION["username1"];

        $q = " SELECT * FROM post INNER JOIN bussign ON post.poster = bussign.username WHERE post.driverselected != '3' ORDER BY post.time DESC ";

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
<a href = "post.html"><button type="button" id = "but10"> Logged in as: <?php echo $_SESSION['username1'];?> </button></a>
<br><br><br><br>


<h2 class = "title">Regina Businesses Donating Now </h2><br><br><br><br><br>
<section>   
<div class = "d2">

<?php
    while($row = $result->fetch_assoc()){
    ?>

  <div class="flex-container">

  <div class="box1">

<img src="<?=$row['foodpic']?>" alt="Avatar" style="width:400px;height:300px;">

  </div>
  
  <div class="box3">
  <br><br>

    <div style="display:inline-block;vertical-align:top;">
    <img src="<?=$row['profile']?>" alt="img" style="width:90px;height:120px;margin-left:5px;">
	</div>
	
	<div style="display:inline-block;"><br>
    <div><b><?=$row['busname']?></b></div>
    <div><?=$row['address']?></div>
    <div><?=$row['phone']?></div>
	</div>
    </div>

    <div class="box2">
  <br><br>
    <p>Pick up time: <?=$row['pickup']?></p>
	<p>Food: <?=$row['food']?></h5><p>
    </div>

</div>
<?php if (($row['shelter1'] == 0 && $row['shelter2'] == 0)) { ?>
<a href = "request.php?pid=<?=$row["postID"]?>"><button type="button" id = "but11"> Request Donation </button></a>
<?php } ?>

<?php if (($row['shelter1'] == 1 && $row['shelter2'] == 0)) { ?>
<a href = "request1.php?pid=<?=$row["postID"]?>"><button type="button" id = "but11"> Request Donation </button></a>
<?php } ?>

<?php if (($row['shelter1'] != 0 && $row['shelter1name'] == $_SESSION["username1"])) { ?>
<a href = "request.php?pid=<?=$row["postID"]?>"><button type="button" id = "but11"> You Have Requested </button></a>
<?php } ?>

<?php if (($row['shelter2'] != 0 && $row['shelter2name'] == $_SESSION["username1"])) { ?>
<a href = "request.php?pid=<?=$row["postID"]?>"><button type="button" id = "but11"> You Have Requested </button></a>
<?php } ?>

<?php if (($row['shelter2'] != 0 && $row['shelter1'] != 0 && $row['shelter1name'] != $_SESSION["username1"] && $row['shelter2name'] != $_SESSION["username1"])) { ?>
<a href = "request.php?pid=<?=$row["postID"]?>"><button type="button" id = "but11"> Max Requests Recieved </button></a>
<?php } ?>

    <br>    <br>
    <br>


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
