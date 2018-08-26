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
  body{
    margin: 0;
    padding: 0;
    color: rgb(117, 117, 117);
    }
    .container{
      width: 550px;
      height: 500px;
      margin: 20px auto;
    }
    ul{
      width: 550px;
    }
    li{
      width: 550px;
    }
    ul:nth-child(1)>li:nth-child(1){
      font-size: 18px;
    }
    ul:nth-child(1)>li:nth-child(2){
      font-size: 15px;
      float: left;
      clear: both;
    }
    ul:nth-child(1)>li:nth-child(3){
      text-align: right;
      right: 10%;
    }
    .myfont{
      font-size: 12px;
    }
    hr{
      width: 550px;
      margin: 0 auto;
      color: #888888;
    }
</style>
</head>
<body>
<?php
   $conn = mysqli_connect("localhost","root","12345678","myfishtank");
   if(!$conn){
     die("连接错误".mysqli_connect_error());
   }

   mysqli_query($conn,"set names utf8");  

   $id=$_GET['id'];
   $sql = "select *from comment where id={$id}";
   
   $rst = mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($rst);
?>
   <div class="container">
     <ul>
       <li>评论详情：</li>
       <li>&nbsp&nbsp&nbsp&nbsp<?php echo $row['content']?></li>
       <li><img src="../images/点赞.png" alt="" width="20px">
        <ul>
          <li class="myfont">200</li>
        </ul>
      </li>
     </ul>
     <hr>
     <!-- <div>
       <h4>追加评论：</h4>
       <p></p>
       <hr>
       <p>挺好</p>
       <hr>
       <p>再优化一下，就更完美了</p>
       <hr>
       <p>感觉很有趣 哈哈哈</p>
     </div> -->
   </div>
  <?php
    mysqli_free_result($rst);
    
    mysqli_close($conn);
  ?>
<script type="text/javascript" src="../js/jquery.min.js"></script> 
<script type="text/javascript" src="../js/H-ui.js"></script> 
<script type="text/javascript" src="../js/H-ui.admin.js"></script> 

</body>
</html>