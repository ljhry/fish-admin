<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />

  <link type="text/css" rel="stylesheet" href="../css/H-ui.css" />
  <link type="text/css" rel="stylesheet" href="../css/H-ui.admin.css" />
  <link type="text/css" rel="stylesheet" href="../font/font-awesome.min.css" />

  <title>用户查看</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      min-height: 200px;
      font-size: 15px;
      color: rgb(51, 51, 51);
    }

    img {
      box-shadow: 3px 3px 10px #888;
      width: 180px;
      transition: 0.8s linear;
    }

    img:hover {
      transform: scale(1.2);
    }

    .container {
      width: 530px;
      height: 100%;
      margin: 0 auto;
      box-sizing: border-box;
    }

    .father:nth-child(1) {
      width: 530px;
      height: 150px;
      box-sizing: border-box;
    }
    .father:nth-child(2) {
      width: 530px;
      height: 100px;
      box-sizing: border-box;
    }
    .father:nth-child(3) {
      width: 530px;
      height: 250px;
      box-sizing: border-box;
    }

    .father:nth-child(1)>.child:nth-child(1){
      width: 200px;
      height: 150px;
      float: left;
      /* background-color: red; */
      margin: 0 auto;
      text-align: center;
      line-height: 150px;
    }
    .father:nth-child(1)>.child:nth-child(2){
      width: 330px;
      height: 150px;
      float: left;
      /* background-color: yellowgreen; */
      margin: 0 auto;
      line-height: 150px;
    }
    .father:nth-child(2)>.child:nth-child(1){
      width: 200px;
      height: 100px;
      float: left;
      /* background-color: rgb(165, 179, 43); */
      margin: 0 auto;
      text-align: center;
      line-height: 100px;
    }
    .father:nth-child(2)>.child:nth-child(2){
      width: 330px;
      height: 100px;
      float: left;
      /* background-color: rgb(205, 50, 197); */
      margin: 0 auto;
      line-height: 100px;
    }
    .father:nth-child(3)>.child:nth-child(1){
      width: 200px;
      height: 250px;
      float: left;
      /* background-color: rgb(38, 0, 255); */
      margin: 0 auto;
      text-align: center;
      /* line-height: 250px; */
    }
    .father:nth-child(3)>.child:nth-child(2){
      width: 330px;
      height: 250px;
      float: left;
      /* background-color: rgb(49, 63, 20); */
      margin: 0 auto;
      /* text-align: center; */
      /* line-height: 250px; */
    }
    .child:nth-child(1){
      color:#000;
      font-weight: block;
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
    <div class="container">
      <div class="father">
        <div class="child">*图片 ：</div>
        <div class="child"> <?php echo "<img src='../uploads/{$row['img']}' width='160px'>"?></div>
      </div>
      <div class="father">
        <div class="child">*学名 ：</div>
        <div class="child"> <?php echo $row['name']?></div>
      </div>
      <div class="father">
        <div class="child">*简单介绍 ：</div>
        <div class="child"><?php echo $row['detail']?></div>
      </div>
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