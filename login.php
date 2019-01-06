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
            
    $account = $_POST['account'];
    $password = $_POST['password']; 
    $phpid = $_POST['phpid']; 
    
    if(isset($account)&& isset($password))
    {
        $sql = "SELECT * FROM user WHERE account = '".$account."' AND password = '".$password."'" ;
        if ($result = $conn->query($sql) )
        {   
                
                if(mysqli_num_rows($result)!=0)
                {
                    //echo "true";
                    $_SESSION["account"] = $account;
                    $row  =  mysqli_fetch_assoc($result);
                    $_SESSION[$phpid] = $row['userid']; //login
                    header('Location: secondPage.php?success='.$account);
                }    
                else 
                {
                    $_SESSION["message"] = "You had the wrong information";
                    
                    $message = "You had the wrong information";
                    echo $message;
                    header('Location: index.html?success=false');
                }
        }
    }
    else{
        $message = "info not correct";
        echo $message;
    }
?>