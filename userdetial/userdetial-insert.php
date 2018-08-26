<style>
    h2{
        color:#888;
    }
</style>
<?php
    include '../public/php/config.php';
    mysqli_query($conn,"set names utf8");  
    $user_id=$_POST['user_id'];
    $fish_id=$_POST['fish_id'];  
    $fish_num=$_POST['fish_num'];  
    $fishtank_id=$_POST['fishtank_id'];    
    $status=$_POST['status'];    
    $sql="insert into userdet(user_id,fish_id,fishtank_id,fish_num,status) values('{$user_id}','{$fish_id}','{$fishtank_id}','{$fish_num}','{$status}')";
    // echo $sql;
    // exit;
    if(mysqli_query($conn,$sql)){
        echo "<center><h2>插入成功<h2></center>";
    }else{
        echo "<center><h2>插入失败<h2></center>";
         
    }
    mysqli_close($conn);
?>