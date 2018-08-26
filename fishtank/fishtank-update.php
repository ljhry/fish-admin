<style>
    h2{
        color:#888;
    }
</style>
<?php
    include '../public/php/config.php';
    mysqli_query($conn,"set names utf8");  

    $fishname=$_POST['fishname'];
    $id=$_POST['id'];
    $imdsrc=$_POST['imgsrc'];
    $imgerror=$_FILES['img']['error'];
  
    if($imgerror==0){
        //图片上传
        $src=$_FILES['img']['tmp_name'];
        $name=$_FILES['img']['name'];
        $ext=array_pop(explode('.',$name));
        $dst='../uploads/'.time().mt_rand().'.'.$ext;

        if(move_uploaded_file($src,$dst)){

            $oldimg="../uploads/{$imgsrc}";
            if(file_exists($oldimg)){//存在该文件
                @unlink($oldimg);
                
            }            
            $img=basename($dst);
            $sql1="update fishtank set name='{$fishname}',img='{$img}' where id={$id}";
            if(mysqli_query($conn,$sql1)){
            echo "<center><h2>修改成功-图片修改成功</h2></center>";
            }
        }

    }else{
        $sql2="update fishtank set name='{$fishname}' where id={$id}";
        if(mysqli_query($conn,$sql2)){
            echo "<center><h2>修改成功-无修改图片<h2></center>";
            
        }else{
            
        }
    }
    mysqli_close($conn);
?>