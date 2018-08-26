<?php
$conn = mysqli_connect("localhost","root","12345678","myfishtank");
mysqli_query($conn,"set names utf8");  

if(isset($_GET['id'])){
    if(!$conn){
        die("连接错误".mysqli_connect_error());
    }
    
    $sql = "delete from user where id={$_GET['id']}";
    
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('删除成功！')</script>";
        
        echo "<script>location='user.php'</script>";
    }else{
        echo "<script>location='user.php'</script>";
    }
    mysqli_close($conn);
}
?>