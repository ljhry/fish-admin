<?php
// require_once('./db.php');
require_once('./response.php');
// 路由 action为url中的参数
$action = $_POST['action'];
// $action = 'register';
switch($action) {
    case 'register':
        register();
        break;
    case 'login':
        login();
        break;
}
function register(){
    $conn = mysqli_connect("localhost","root","12345678","myfishtank");
    if(!$conn){
        die("连接错误".mysqli_connect_error());
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $time = time();
    $data = array(
        'username'=>$username,
        'password'=>$password,
        'userLevel'=>0
    );
    $username = htmlspecialchars($username);
    $password = MD5($password);
    if(!isset($username)||!isset($password)){
        return Response::show(501,"用户名和密码为空");
    }
    if(strlen($password) < 6){
        return Response::show(502,"密码长度不能小于6位");
    }
   
    $sql1 = "select *from user where username='$username' ";
    $rst = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($rst);
    if($username == $row['username']){
        return Response::show(801,"用户名已经存在");
         mysqli_free_result($rst);
    }else{
        $sql2 = "insert into user(username,password,isadmin,time) values('{$username}','{$password}',0,'{$time}')";
        if(mysqli_query($conn,$sql2)){
            return Response::show(800,"注册成功",$data);
        }
    }
    mysqli_close($conn);
}
function login(){
    $conn = mysqli_connect("localhost","root","12345678","myfishtank");
    if(!$conn){
        die("连接错误".mysqli_connect_error());
    }
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $data = array(
        'username'=>$username,
        'password'=>$password,
        'userLevel'=>0
    );
    $password = MD5($password);
    $sql3 = "select *from user where username = '$username' and password = '$password' ";
    $rst3 = mysqli_query($conn,$sql3);
    $row3 = mysqli_fetch_assoc($rst3);
    if($username==$row3['username']&&$password==$row3['password']){
        return Response::show(900,"登陆成功",$data);
        mysqli_free_result($rst3);
    }else{
        return Response::show(901,"登陆失败");
    }
    mysqli_close($conn);
}
