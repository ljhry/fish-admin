<?php
   include "../public/php/config.php";
   mysqli_query($conn,"set names utf8");  
    $id=$_GET['id'];

    $sql="delete from userdet where id={$_GET['id']}";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('删除成功')</script>";        
        echo "<script>location='userdetial.php'</script>";

    }else{
        echo "<script>alert('删除失败')</script>";        
        echo "<script>location='userdetial.php'</script>";
        
    mysqli_close($conn);     
    }