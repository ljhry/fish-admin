<?php
require_once('./db.php');
require_once('./response.php');

// 路由 action为url中的参数
$action = $_POST['action'];
$action = 'register';
switch($action) {
    case 'register':
        register();
        break;
    case 'login':
        login();
        break;
}
//检测数据库连接是否正常
try{
    $connect = Db::getInstance()->connect();
}catch(Exception $e){
    return Response::show(403,"数据库连接失败");
}
function register(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $time = time();

    if(!isset($username)||!isset($password)){
        return Response::show(500,"用户名和密码为空");
    }
    if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
        return Response::show(501,"用户名不合法");
    }
    if(strlen($password) < 6){
        return Response::show(502,"密码长度不能小于6位");
    }
    if(!preg_match('/^w+([-+.]w+)*@w+([-.]w+)*.w+([-.]w+)*$/', $email)){
        return Response::show(503,"邮箱格式不正确");
    }
    $password =MD5($password);
    $sql = "insert into user(username,password,isadmin,time) values('{$username}','{$password}',0,'{$time}')";
    if(mysqli_query($connect,$sql)){
        return Response::show(200,"注册成功");
    }

}
function login(){
    $username = htmlspecialchars($_POST['username']);
    $password = MD5($_POST['password']);
    $sql1 = "select *from user where username={$username} and password={$password}";
    if(mysqli_query($connect,$sql1)){
        return Response::show(201,"登陆成功");
    }else{
        return Response::show(202,"登陆失败");
    }
}
