<?php
    include '../public/php/config.php';

    $fishname=$_POST['fishname'];
    $fishph=$_POST['fishph'];
    $fishtem=$_POST['fishtem'];
    $fishfeed = $_POST['fishfeed'];
    $fishe = $_POST['fishe'];
    $fisho = $_POST['fisho'];
    $fishw = $_POST['fishw'];
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
            $sql1="update fish set name='{$fishname}',img='{$img}',ph='{$fishph}',tem='{$fishtem}',feed='{$fishfeed}',wfilter='{$fishe}',oxygen='{$fisho}',wexchange='{$fishw}' where id={$id}";
            if(mysqli_query($conn,$sql1)){
            echo "<center><h2>修改成功-图片修改成功</h2></center>";
            }
        }

    }else{
        $sql2="update fish set name='{$fishname}',ph='{$fishph}',tem='{$fishtem}',feed='{$fishfeed}',wfilter='{$fishe}',oxygen='{$fisho}',wexchange='{$fishw}' where id={$id}";
        if(mysqli_query($conn,$sql2)){
            echo "<center><h2>修改成功-无修改图片</h2></center>";
            
        }else{
            
        }
    }
    mysqli_close($conn);
?>