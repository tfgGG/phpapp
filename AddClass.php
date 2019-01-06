<?php
    session_start();
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
            
            $ndate = $_POST['date'];
            $ntime = $_POST['time'];
            $nroom = $_POST['room']; 
            $nuser = $_POST['user'];
            

        if(isset($_POST['tabletype']) && $_POST['tabletype']== 'semester'){
            $nweek = $_POST['week'];
            $sql = "INSERT INTO semester (week, time, room ,user) VALUES ('" .$nweek."','".$ntime."','".$nroom."','".$_SESSION[$nuser]."')";   
        }
        else{
            $sql = "INSERT INTO class (room, time, date,user) VALUES ('" .$nroom."','".$ntime."','".$ndate."','".$_SESSION[$nuser]."')";   

        }

        if ($conn->query($sql) === TRUE) {
             echo $_SESSION[$nuser];
            header('Location: fourthPage.php');
         } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
         } 

        $conn->close(); 


?>