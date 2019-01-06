<?php

header('Content-Type: application/json; charset=utf-8');
$servername = "localhost";
 $username = "root";
 $password = "";
     // Create connection
 $conn = mysqli_connect($servername, $username, $password);
     // Check connectionif (!$conn) {
 if (!$conn) 
     die("Connection failed: " . mysqli_connect_error());
 //else
     //echo "Connected successfully \n";
 $db_selected = mysqli_select_db($conn,'phpapp');

 if (!$db_selected) 
     die ('Can\'t use: ' . mysqli_error());

$sql='';   
if($_POST['type']=='class')
{
     $sql = "DELETE FROM class WHERE classid = ".$_POST['id'];
}

if($_POST['type']=='semester')
{
    $sql = "DELETE FROM semester WHERE ssid = ".$_POST['id'];
}

if($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
} 
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
  
?>