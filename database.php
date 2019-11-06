<?php
function connectdb()
{
    $params = array(
        'host' => 'localhost',
        'dbname' => 'dbphp',
        'user' => 'root',
        'password' => '11111111',
    );
    $dsn="mysql:host={$params['host']};dbname={$params['dbname']}";
    $db=new PDO($dsn,$params['user'],$params['password']);
    $db->exec("set names utf8");
    return $db;
}
function getUsers(){
    $sql="SELECT * FROM `users`";
    $result=connectdb()->query($sql);
    $mass=array();
    $logins=array();
    $i=1;
    while ($row=$result->fetch()){
        $logins[$i]=$row['login'];
        $i++;
    }
    return $logins;
}
function getUser($login){
    $sql="SELECT * FROM users WHERE login='$login'";
    $result=connectdb()->query($sql);
    return $result->fetch();
}
function isLogin($login){

    return in_array($login,getUsers());

}
function isPassword($login,$password){
if (isLogin($login)){
    if (getUser($login)['password']==$password){
        return True;
    } else{
        return False;
    }
}
}
function showUser($login){
    if (isLogin($login)){
        $user=getUser($login);
        echo "ID:".$user['id']."<br>";
        echo "LOGIN:".$user['login']."<br>";
        echo "PASSWORD:".$user['password']."<br>";
        echo "FULLNAME:".$user['fullname']."<br>";

    }
}
echo "TEST";
showUser('admin');
showUser('vasya');
