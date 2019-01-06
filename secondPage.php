<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
#calendar{
  margin-left: auto;
  margin-right: auto;
  width: 320px;
  font-family: 'Lato', sans-serif;
}
#calendar_weekdays div{
  display:inline-block;
  vertical-align:top;
}
#calendar_content, #calendar_weekdays, #calendar_header{
  position: relative;
  width: 320px;
  overflow: hidden;
  float: left;
  z-index: 10;
}
#calendar_weekdays div, #calendar_content div{
  width:40px;
  height: 40px;
  overflow: hidden;
  text-align: center;
  background-color: #FFFFFF;
  color: #787878;
}
#calendar_content{
  -webkit-border-radius: 0px 0px 12px 12px;
  -moz-border-radius: 0px 0px 12px 12px; 
  border-radius: 0px 0px 12px 12px;
}
#calendar_content div{
  float: left;
}
#calendar_content div:hover{
  background-color: #F8F8F8;
}
#calendar_content div.blank{
  background-color: #E8E8E8;
}
#calendar_header, #calendar_content div.today{
  zoom: 1;
  filter: alpha(opacity=70);
  opacity: 0.7;
}
#calendar_content div.today{
  color: #FFFFFF;
}
#calendar_header{
  width: 100%;
  height: 37px;
  text-align: center;
  background-color: #FF6860;
  padding: 18px 0;
  -webkit-border-radius: 12px 12px 0px 0px;
  -moz-border-radius: 12px 12px 0px 0px; 
  border-radius: 12px 12px 0px 0px;
}
#calendar_header h1{
  font-size: 1.5em;
  color: #FFFFFF;
  float:left;
  width:70%;
}
i[class^=icon-chevron]{
  color: #FFFFFF;
  float: left;
  width:15%;
  border-radius: 50%;
}
</style>


        

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img id="nav-door" src="/image/door.png" alt="">
        <a class="navbar-brand" href="#">教室預借系統</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="secondPage.php">平時預借<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="thirdPage.php">學期預借</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fourthPage.php">預約記錄</a>
                </li>
                <li class="nav-item">
                   <!-- <button class="nav-link" onclick = ''>登出</button>-->
                </li>
                <li class="nav-item"> 
                <?php 
                    try{
                        session_start();
                    }catch(Exception $e){
                        
                    }
                        
                    if($_SESSION[$_COOKIE['PHPSESSID']] != -1)
                    {
                        //echo $_SESSION[$_COOKIE['PHPSESSID']];
                        echo  "<form action='logout.php' method='post'><input type='hidden' class='phpid' name='phpid' value=''><button class='nav-link' type='submit'>登出</button></form>";
                        //header('Location: index.php');
                
                    }else{
                        header('Location: index.php');
                    }
                ?>
                </li>
                <?php
                    echo $_SERVER['QUERY_STRING'];

                ?>
            </ul>

        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-5" style="margin-top: 50px;">
                <div id="calendar">
                    <div id="calendar_header"><i class="icon-chevron-left"></i>
                        <h1></h1><i class="icon-chevron-right"></i>
                    </div>
                    <div id="calendar_weekdays"></div>
                    <div id="calendar_content"></div>
                </div>
            </div>
            <div class="col-7" style="margin-top: 120px;">
                <h3 class="text-center">教室預約系統</h3>
                <form action="AddClass.php" method="post" id="classform">
                    <div class="form-group">
                        <label for="">借用日期</label>
                        <?php 
                            /*if($_SERVER['QUERY_STRING']!=null)
                            {
                                echo "<div id='dateview'></div><input name='date' type='hidden' id='hiddeninput' value=''>";
                            }/*else{
                                $conn = mysqli_connect('localhost', 'root', '');
                                $arrays = explode("=",$_SERVER['QUERY_STRING']);
                                if($result=$conn->query('SELECT * FROM　class WHERE classid='.$arrays[1]))
                                {

                                }
                            }*/
                        ?>
                        <div id="dateview"></div>
                        <input name="date" type='hidden' id='hiddeninput' value="">
                    </div>

                    <div class="form-group">
                        <label for="">借用教室</label>
                        <select class="form-control" id="exampleFormControlSelect1" name='room' form="classform">
                            <option value="" selected>選擇借用教室</option>
                            <option value="教室A">教室A</option>
                            <option value="教室B">教室B</option>
                            <option value="教室C">教室C</option>
                            <option value="教室C">教室C</option>
                            <option value="教室E">教室E</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">借用時段</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="time" form="classform">
                            <option value='' selected>選擇借用時段</option>
                            <option value='08:00~09:00'>08:00~09:00</option>
                            <option value="09:00~10:00">09:00~10:00</option>
                            <option value="10:00~11:00">10:00~11:00</option>
                            <option value="11:00~12:00">11:00~12:00</option>
                            <option value="12:00~13:00">12:00~13:00</option>
                            <option value="13:00~14:00">13:00~14:00</option>
                            <option value="14:00~15:00">14:00~15:00</option>
                            <option value="15:00~16:00">15:00~16:00</option>
                            <option value="16:00~17:00">16:00~17:00</option>
                        </select>
                    </div>
                    <input type='hidden' id="phpid" class="phpid" name="user">
                    <input type="hidden" name='tabletype' value="class">
                    <button type='submit' class="btn btn-block btn-success">預約</button>
                    
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
        $(function() {



            function c() {
                p();
                var e = h();
                var r = 0;
                var u = false;
                l.empty();
                while (!u) {
                    if (s[r] == e[0].weekday) {
                        u = true;
                    } else {
                        l.append('<div class="blank"></div>');
                        r++;
                    }
                }
                for (var c = 0; c < 42 - r; c++) {
                    if (c >= e.length) {
                        l.append('<div class="blank"></div>');
                    } else {
                        var v = e[c].day;
                        var m = g(new Date(t, n - 1, v)) ? '<div class="today">' : "<div>";
                        l.append(m + "" + v + "</div>");
                    }
                }
                var y = o[n - 1];
                a
                    .css("background-color", y)
                    .find("h1")
                    .addClass('month')
                    .text(i[n - 1] + " " + t);
                f.find("div").css("color", y);
                l.find(".today").css("background-color", y);
                d();
            }

            function h() {
                var e = [];
                for (var r = 1; r < v(t, n) + 1; r++) {
                    e.push({
                        day: r,
                        weekday: s[m(t, n, r)]
                    });
                }
                return e;
            }

            function p() {
                f.empty();
                for (var e = 0; e < 7; e++) {
                    f.append("<div>" + s[e].substring(0, 3) + "</div>");
                }
            }

            function d() {
                var t;
                var n = $("#calendar").css("width", e + "px");
                n
                    .find((t = "#calendar_weekdays, #calendar_content"))
                    .css("width", e + "px")
                    .find("div")
                    .css({
                        width: e / 7 + "px",
                        height: e / 7 + "px",
                        "line-height": e / 7 + "px"
                    })
                    .addClass("dates");
                n
                    .find("#calendar_header")
                    .css({
                        height: e * (1 / 7) + "px"
                    })
                    .find('i[class^="icon-chevron"]')
                    .css("line-height", e * (1 / 7) + "px");
            }

            function v(e, t) {
                return new Date(e, t, 0).getDate();
            }

            function m(e, t, n) {
                return new Date(e, t - 1, n).getDay();
            }

            function g(e) {
                return y(new Date()) == y(e);
            }

            function y(e) {
                return e.getFullYear() + "/" + (e.getMonth() + 1) + "/" + e.getDate();
            }

            function b() {
                var e = new Date();
                t = e.getFullYear();
                n = e.getMonth() + 1;
            }
            var e = 480;
            var t = 2013;
            var n = 9;
            var r = [];
            var i = [
                "JANUARY",
                "FEBRUARY",
                "MARCH",
                "APRIL",
                "MAY",
                "JUNE",
                "JULY",
                "AUGUST",
                "SEPTEMBER",
                "OCTOBER",
                "NOVEMBER",
                "DECEMBER"
            ];
            var s = [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday"
            ];
            var o = [
                "#16a085",
                "#1abc9c",
                "#c0392b",
                "#27ae60",
                "#FF6860",
                "#f39c12",
                "#f1c40f",
                "#e67e22",
                "#2ecc71",
                "#e74c3c",
                "#d35400",
                "#2c3e50"
            ];
            var u = $("#calendar");
            var a = u.find("#calendar_header");
            var f = u.find("#calendar_weekdays");
            var l = u.find("#calendar_content");
            b();
            c();
            a.find('i[class^="icon-chevron"]').on("click", function() {
                var e = $(this);
                var r = function(e) {
                    n = e == "next" ? n + 1 : n - 1;
                    if (n < 1) {
                        n = 12;
                        t--;
                    } else if (n > 12) {
                        n = 1;
                        t++;
                    }
                    c();
                };
                if (e.attr("class").indexOf("left") != -1) {
                    r("previous");
                } else {
                    r("next");
                }
            });

            //var cur = new Date();

            $(document.body).on('click', '.dates',function(){
                var temp = $(".month").text().split(" ");

                var index = i.findIndex(function(el){
                    return el == temp[0]
                });
                var cur = new Date();
                var clickdate = new Date(index+1+'/'+$(this).text()+'/'+temp[1]+" 00:00:00")
                var clickafter = clickdate.getTime();
                var after = cur.getTime();
                var result = (clickafter - after)/(1000*60*60*24);
                console.log(cur)
                console.log(clickdate+" "+index+" "+temp[1])
                console.log(after +" "+ clickafter)
                if(result<30 && result>0)
                {
                    $("#dateview").text(temp[0] + "-" + $(this).text())
                    $('#hiddeninput').val(temp[0] + "-" + $(this).text())
                    $('button').prop('disabled', false);
                }else{
                    $("#dateview").text("請勿選擇超過30日的日期");
                    $('button').prop('disabled', true);
                }
            });

            console.log(document.cookie)
            var id  = document.cookie.split('=')
            $('.phpid').val(id[1])
            console.log(id[1])
        });

    </script>

</body>

</html>
