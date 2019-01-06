<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function(){
            
            console.log(document.cookie)
            var id  = document.cookie.split('=')
            $('#phpid').val(id[1])
        })
    </script>
</head>
<style>
    #nav-door{
    width: 50px;
    height: 50px;
    }
</style>


<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: antiquewhite;">
        <img id="nav-door" src="/image/door.png" alt="">
        <a class="navbar-brand" href="#">教室預借系統</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://www.im.fju.edu.tw/">輔仁大學資訊管理學系 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.youtube.com/channel/UCpZa7ZTWZd5S98nG61xltWw">聯絡我們</a>
                </li>

            </ul>

        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-5 d-flex align-items-center" style="height: 650px;">
                <div><img src="/image/calendar.png" alt="" style="width: 300xp; height: 300px; "></div>
            </div>
            <div class="col-7" style="margin-top: 120px;">
                <h1 class="text-center">Room Reservation System</h1>
                <h1 class="text-center">教室使用預借系統</h1>
                <h3 class="text-center">請使用輔仁大學單一帳號登入</h3>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">學號</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="account" placeholder="請輸入學號" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">密碼</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="請輸入密碼" required>
                    </div>
                    <input type='hidden' value="" id='phpid' name="phpid">
                    <?php 
                        $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(strpos($fullurl,"success=false")== true)
                        {
                            echo "<p style='color:red;'>Your information isnotcorrect</p>";
                        }
                    ?>
                    <button type="submit" class="btn btn-block" style="background-color: antiquewhite;">登入</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
