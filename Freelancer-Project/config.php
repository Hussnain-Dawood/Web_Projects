<?php
$server="127.0.0.1:3308";
$username="root";
$password="";
$database="freelancer_hub";
$con=mysqli_connect($server,$username,$password,$database);

if(!$con){
    die  ("connection to this database failed due to". mysqli_connect_error());
}

?>