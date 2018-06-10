<?php
    session_start();
    include "../public/php/config.php";
    $password=md5($_POST['password']);

    $sql="update user set password='{$password}' where username='admin'";

     if(mysqli_query($conn,$sql)){
         
         $_SESSION=array();
         session_destroy();
         setcookie('PHPSESSION','',time()-3600,'/');

         echo "<script>alert('修改成功')</script>";
         echo "<script>top.location='../login.html'</script>";
     }else{
         echo "<script>alert('修改失败')</script>";
         echo "<script>location='user-password-edit.php'</script>";
         
     }

?>