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
            
        //&&isset($_POST['time'])&&isset($_POST['room'])


            /*$ndate = $_POST['date'];
            $ntime = $_POST['time'];
            $nroom = $_POST['room']; 
            $nuser = $_POST['user'];*/
            $ndate = $_POST['date'];
            $ntime = $_POST['time'];
            $nroom = $_POST['room']; 
            $nuser = $_POST['user'];
            
            /*$stmt = $conn->prepare("INSERT INTO class (user,room,time,date) VALUES (?,?,?,?)" );

            if ($stmt === FALSE) {
                die ("Mysql Error: " . $conn->error);
            }

            $stmt->bind_param("sssi",$date,$time,$room,$user);
            
            try{
                echo "successfully".$_REQUEST['date'];
                $date=$ndate;
                $time=$ntime;
                $room=$nroom;
                $user= 1 ;
            }
            catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }*/
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
        //echo "successfully".$_REQUEST['date'];
       // $stmt->close();
        $conn->close(); 

      // print_r( $_REQUEST);
   
   


?>