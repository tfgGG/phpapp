<?php
session_start();
if($_POST['phpid'] == -1)
    header('Location: index.php');
else{
    $_SESSION[$_POST['phpid']] = -1;
    header('Location: index.php');
}
?>