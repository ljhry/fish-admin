<?php
    $conn = mysqli_connect("localhost","root","12345678","myfishtank");
    if(!$conn){
    die("连接错误".mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");  

    $id=$_GET['id'];
    $img=$_GET['img'];
    $file="../uploads/{$img}";

    $sql="delete from fish where id={$_GET['id']}";
    if(mysqli_query($conn,$sql)){
        unlink($file);
        echo "<script>alert('删除成功')</script>";        
        echo "<script>location='fish.php'</script>";

    }else{
        echo "<script>alert('删除失败')</script>";        
        echo "<script>location='fish.php'</script>";
        
            
    }