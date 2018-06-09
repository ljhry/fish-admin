<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />

<link type="text/css" rel="stylesheet" href="../css/H-ui.css"/>
<link type="text/css" rel="stylesheet" href="../css/H-ui.admin.css"/>
<link type="text/css" rel="stylesheet" href="../font/font-awesome.min.css"/>

<title>用户查看</title>
<style>
body{ min-height:200px; font-size:14px;color: #888}
td,th{ font-size:14px;}
img{
  box-shadow: 5px 5px 8px #888;
  width: 150px;
}
</style>
</head>
<body>
<?php
   $conn = mysqli_connect("localhost","root","12345678","myfishtank");
   if(!$conn){
     die("连接错误".mysqli_connect_error());
   }
   $id=$_GET['id'];
   $sql = "select *from fish where id={$id}";
   
   $rst = mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($rst);
?>
<div class="pd-20">
<div class='myimg'>
  
  <table class="table">
    <tbody>
      <tr>
        <th class="text-r">名称：</th>
        <td><?php echo $row['name']?></td>
      </tr>
      
      <tr>
        <th class="text-r">图片：</th>
          <td><?php echo "<img src='../uploads/{$row['img']}' width='150px'>"?></td>
      </tr>
     
    </tbody>
  </table>
  </div>
  <?php
    mysqli_free_result($rst);
    
    mysqli_close($conn);
  ?>
</div>
<script type="text/javascript" src="../js/jquery.min.js"></script> 
<script type="text/javascript" src="../js/H-ui.js"></script> 
<script type="text/javascript" src="../js/H-ui.admin.js"></script> 

</body>
</html>