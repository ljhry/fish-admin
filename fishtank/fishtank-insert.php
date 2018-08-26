<?php
    $conn = mysqli_connect("localhost","root","12345678","myfishtank");
    if(!$conn){
        die("连接错误".mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");  

    $fishtankname = $_POST['fishtankname'];
    if(isset($fishtankname)&&$fishtankname!=""){
        if ($_FILES["file"]["error"] > 0){
            echo "错误：: " . $_FILES["file"]["error"] . "<br>";
        }
        $src=$_FILES['img']['tmp_name'];
        $name=$_FILES['img']['name'];
        $ext=array_pop(explode('.',$name));
        $dst='../uploads/'.time().mt_rand().'.'.$ext;
        
        if(move_uploaded_file($src,$dst)){
            //图片缩放
            $img=basename($dst);
            
            $sql="insert into fishtank(name,img) values('{$fishtankname}','{$img}')";
        
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('添加成功')</script>";
                echo "<script>location='fishtank-add.html'</script>";
            }else{
                echo "<script>alert('添加失败')</script>";
                echo "<script>location='fishtank-add.html'</script>";        
            }
        }
    }else{   
        echo "<script>alert('请输入名称！')</script>";    
        echo "<script>location='fishtank-add.html'</script>";        
            
    }
?>