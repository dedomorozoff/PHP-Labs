<?php
session_start();
if ($_GET['do']=='logout'){
    unset($_SESSION['admin']);
    session_destroy();
}
    if ($_SESSION['admin']!="admin"){
        header("Location:login.php");
        exit;
    }?>
<h1>Вы авторизованы!!!</h1>
<a href="index.php?do=logout">Выттти</a>

