<?php
    $conn = mysqli_connect("localhost","root","12345678","myfishtank");
    if(!$conn){
    die("连接错误".mysqli_connect_error());
    }
    $id=$_GET['id'];

    $sql="delete from comment where id={$_GET['id']}";
    if(mysqli_query($conn,$sql)){
        // unlink($file);
        echo "<script>alert('删除成功')</script>";        
        echo "<script>location='comment.php'</script>";

    }else{
        echo "<script>alert('删除失败')</script>";        
        echo "<script>location='comment.php'</script>";
        
            
    }