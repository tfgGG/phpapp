<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>fujay</title>
</head>
<style>
    #nav-door{
    width: 50px;
    height: 50px;
    }
    body{
  background-color: lightgray;
}

</style>
<script>
$(document).ready(()=>{

  $('.delete').click(function(){
        $.ajax({
        type: 'POST',                  
        url: 'delete.php',              
        cache: false,                    
        data: {id: $(this).attr('id'), type: $(this).attr('name') },    
        success: function(){
            location.reload()
        },       
        error: function(error){
            console.log(error)
            location.reload();
        },           
        statusCode: {                    
        404: function() {
            alert("page not found");
        }
        }
        });

  });
    
   console.log(document.cookie)
   var id  = document.cookie.split('=')
   $('#phpid').val(id[1])
   console.log(id[1])

});

</script>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img id="nav-door" src="/image/door.png" alt="">
        <a class="navbar-brand" href="#">教室預借系統</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="secondPage.php">平時預借<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="thirdPage.php">學期預借</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="fourthPage.php">預約記錄</a>
                </li>
                <li class="nav-item"> 
                <?php 
                    try{
                        session_start();
                    }catch(Exception $e){
                        echo ' ';
                    }
                        
                    if($_SESSION[$_COOKIE['PHPSESSID']] != -1)
                    {
                        //echo $_SESSION[$_COOKIE['PHPSESSID']];
                        echo  "<form action='logout.php' method='post'><input type='hidden' id='phpid' name='phpid' value=''><button class='nav-link' type='submit'>登出</button></form>";
                        //header('Location: index.php');
                
                    }else{
                        header('Location: index.php');
                    }
                ?>
                </li>
            </ul>

        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">

            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">教室</th>
                            <th scope="col">日期</th>
                            <th scope="col">時間</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
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
                                $rarray = [];
                                $sql = "SELECT * FROM class WHERE user = ".$_SESSION[$_COOKIE['PHPSESSID']];
                                $sql2 = "SELECT * FROM semester WHERE user = ".$_SESSION[$_COOKIE['PHPSESSID']];
                                if ($result = $conn->query($sql))
                                {   
                                        $i = 1;
                                        if(mysqli_num_rows($result)!=0)
                                        {
                                           
                                            foreach( $result as $value)
                                            {
                                                echo "<tr><th scope='row'>".$i."</th><td>".$value['room']."</td><td>".$value['date']."</td><td>".$value['time']."<button id='".$value['classid']."' class='btn btn-danger delete' name='class'>刪除</button>
                                                </td></tr>";
                                                $object = new stdClass();
                                                $object->room =  $value['room'];
                                                $object->time = $value['time'];
                                                $object->classid = $value['classid'];
                                                $object->date = $value['date'];
                                                $i = $i + 1;
                                                $rarray[] = $object;
                                            }
                                        }    
                                        //echo json_encode($rarray);
                                        //else 
                                          //  echo "<tr><th scope='row'><b>沒有預借紀錄</b></th><td></td><td></td><td></td></tr>";                 
                                }
                               

                                if ($result2 = $conn->query($sql2) )
                                { 
                                    
                                    if(mysqli_num_rows($result2)!=0)
                                    {
                                        $j = $i;
                                        foreach( $result2 as $value)
                                        {
                                            echo "<tr bgcolor='#cee1ff'><th scope='row'>".$j."</th><td>".$value['room']."</td><td>".$value['week']."</td><td>".$value['time']."<button id='".$value['ssid']."' class='btn btn-danger delete' name='semester'>刪除</button>
                                            </td></tr>";                 
                                            $j = $j + 1;
                                            $object = new stdClass();
                                            $object->room =  $value['room'];
                                            $object->time = $value['time'];
                                            $object->classid = $value['ssid'];
                                            $object->week = $value['week'];
                                            $r2array[] = $object;                                     
                                        }
                                    }
                                }
                                function printout_r1(){
                                    global $rarray;
                                    echo json_encode($rarray);
                                }
                                function printout_r2(){
                                    global $r2array;
                                    echo json_encode($r2array);
                                }
                        ?>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    

</body>

</html>
