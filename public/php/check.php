<?php
session_start();
$conn = mysqli_connect("localhost","root","12345678","myfishtank");
if(isset($_POST['username']) && isset($_POST['password'])){
    if(!$conn){
        die("连接错误".mysqli_connect_error());
    }
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // echo $username;
    // echo $password;
    // exit;
    
    $sql = "select * from user where isadmin=1";
    
    $rst = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($rst);

    if($username==$row['username']&&$password==$row['password']){
        $_SESSION['login']=1;
        echo "<script>location='../../index.php'</script>";
    }else{
        echo "<script>location='../../login.html'</script>";
    }
    mysqli_free_result($rst); 
    mysqli_close($conn);
}
?>