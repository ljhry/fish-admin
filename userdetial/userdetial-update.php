<style>
    h2{
        color:#888;
    }
</style>
<?php
    include '../public/php/config.php';
    mysqli_query($conn,"set names utf8");  

    $id=$_POST['id'];
    $fish_id=$_POST['fish_id']; 
    $fish_num = $_POST['fish_num'];   
    $fishtank_id=$_POST['fishtank_id'];    
    $status=$_POST['status'];    
    $sql="update userdet set fish_id='{$fish_id}',fishtank_id='{$fishtank_id}',fish_num='{$fish_num}',status='{$status}' where id={$id}";
    if(mysqli_query($conn,$sql)){
        echo "<center><h2>修改成功<h2></center>";
    }else{
        echo "<center><h2>修改失败<h2></center>";
         
    }
    mysqli_close($conn);
?>