<?php
    $conn = mysqli_connect("localhost","root","12345678","myfishtank");
    if(!$conn){
        die("连接错误".mysqli_connect_error());
    }
    $fishname = $_POST['fishname'];
    $fishph = $_POST['fishph'];
    $fishtem = $_POST['fishtem'];
    $fishfeed = $_POST['fishfeed'];
    $fishe = $_POST['fishe'];
    $fisho = $_POST['fisho'];
    $fishw = $_POST['fishw'];
    $detail = $_POST['detail'];
    // echo $fishph."<br>".$fishtem."<br>".$fishname;
    // exit;
    if(isset($fishname)&&$fishname!=""){
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
            
            $sql="insert into fish(name,img,ph,tem,feed,wfilter,oxygen,wexchange,detail) values('{$fishname}','{$img}','{$fishph}','{$fishtem}','{$fishfeed}','{$fishe}','{$fisho}','{$fishw}','{$detail}')";
        
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('添加成功')</script>";
                echo "<script>location='fish-add.html'</script>";
            }else{
                echo "<script>alert('添加失败')</script>";
                echo "<script>location='fish-add.html'</script>";        
            }
        }
    }else{   
        echo "<script>alert('请输入名称！')</script>";    
        echo "<script>location='fish-add.html'</script>";        
            
    }
?>