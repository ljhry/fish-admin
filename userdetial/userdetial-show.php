<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/PIE_IE678.js"></script>
<![endif]-->
<link type="text/css" rel="stylesheet" href="../css/H-ui.css"/>
<link type="text/css" rel="stylesheet" href="../css/H-ui.admin.css"/>
<link type="text/css" rel="stylesheet" href="../font/font-awesome.min.css"/>

<title>知识点管理</title>
</head>
<body>
<?php
   $conn = mysqli_connect("localhost","root","12345678","myfishtank");
   if(!$conn){
     die("连接错误".mysqli_connect_error());
   }
   $id=$_GET['id'];

   $sql = "select *from userdet where id={$id}";
   $rst = mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($rst);

   $sql1 = "select *from fishtank where id={$row['fishtank_id']}";
   $rst1 = mysqli_query($conn,$sql1);
   $row1=mysqli_fetch_assoc($rst1);

   $sql2 = "select *from fish where id={$row['fish_id']}";
   $rst2 = mysqli_query($conn,$sql2);
   $row2=mysqli_fetch_assoc($rst2);

?>
<div class="pd-20 text-c">
  <div class="article-class-list cl">
    <table class="table table-border table-bordered table-hover table-bg">
      <thead>
        <tr class="text-c">
          <th width="120">水族箱</th>
          <th width="120">观赏鱼</th>
          <th width="80">种类</th>
          <th width="50">数量</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-c">
          <td><?php echo "<img src='../uploads/{$row1['img']}' width='100px'>"?></td>
          <td><?php echo "<img src='../uploads/{$row2['img']}' width='80px'>"?></td>
          <td><?php echo $row2['name']?></td>
          <td><?php echo $row['fish_num']?></td>
        </tr>
        
    <?php
    mysqli_free_result($rst);
    mysqli_free_result($rst1);
    mysqli_free_result($rst2);
    
    mysqli_close($conn);
  ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/Validform_v5.3.2_min.js"></script> 
<script type="text/javascript" src="../layer/layer.min.js"></script>
<script type="text/javascript" src="../js/H-ui.js"></script>
<script type="text/javascript" src="../js/H-ui.admin.js"></script>

</body>
</html>