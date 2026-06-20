<?php
$insert=false;
if(isset($_POST['Name'])){
$server="127.0.0.1:3308";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"travel");

if(!$con){
    die  ("connection to this database failed due to". mysqli_connect_error());
}
// echo"Successfully connected to the database";
$Name=$_POST['Name'];
$Age=$_POST['Age'];
$Gender=$_POST['Gender'];
$Email=$_POST['Email'];
$Phone_Number=$_POST['Phone_Number'];
$Information=$_POST['Information'];

$sql="INSERT INTO `travel`.`travel` (`Name`, `Age`, `Gender`, `Email`, `Phone_Number`, `Information`, `Date`)
VALUES ('$Name', '$Age', '$Gender', '$Email', '$Phone_Number', '$Information', current_timestamp())";

//  echo $sql;

 if($con->query($sql)==TRUE)
 {
    // echo"Successfully submitted";
    $insert=True;
 }
 else
 {
    echo"Error : $sql <br> $con->error";
 }
 $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <img class=" image" src="image2.avif" alt="Travel World">
    <div class="container">
        <h1>Welcome to Travel Form</h1>
        <p>Enter you details and submit  to confirm your participation in the trip </p>
      <?php
      if ($insert==true){
        echo "<p class='submitMsg'>Thanks for submitting your form</p>";
       } ?>
    <form action=" index.php " method="post">

        <input type="text"name="Name"id="Name"placeholder="Enter your Name">
        <input type="text"name="Age"id="Age"placeholder="Enter your Age">
        <input type="text"name="Gender"id="Gender"placeholder="Enter your Gender">
        <input type="email"name="Email"id="Email"placeholder="Enter your @gmail">
        <input type="phone"name="Phone_Number"id="Phone_Number"placeholder="xxx-xxxxxxxx">
        <textarea name="Information" id="Information"col="30"rows="10" placeholder="Enter any Information"></textarea>
        <span><button class="btn">Submit</button>
        <button class="btn">Reset</button></span>
    </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

 