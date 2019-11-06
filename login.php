<?php
session_start();
$users='admin';
$pass='1234';
function inValid($value){
    $value=trim($value);
    //$value=htmlspecialchars(stripslashes($value));
    if (empty($value)) return False;
    elseif (preg_match('[a-zA-Z0-9-]',$value)) return False;
    else return True;
}
//echo var_dump($GLOBALS);
if ($_POST['submit']){
    if ($users == $_POST['login'] && $pass==$_POST['password']){
        $_SESSION['admin']=$users;
        header("Location:index.php");
        exit;
    }
  else
  {
      echo var_dump((inValid($_POST['login'])));

     if (!inValid($_POST['login'])){
         echo 'Логин плох';
     }

  }
}
?>
<br>
<form method="post">
    Username:<input type="text" name="login"><br>
    Password:<input type="password" name="password"><br>
    <input type="submit" name="submit" value="ENTER">
</form>