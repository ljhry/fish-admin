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
<link type="text/css" rel="stylesheet" href="css/H-ui.css"/>
<link type="text/css" rel="stylesheet" href="css/H-ui.admin.css"/>
<link type="text/css" rel="stylesheet" href="font/font-awesome.min.css"/>
<!--[if IE 7]>
<link href="font/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<style>
  .myimg{
    position: absolute;
    width: 110px;
    height: 110px;
    right: 50px;
    top:10px;
  }
</style>
<title>我的桌面</title>
</head>
<body>
<div class="pd-20" style="padding-top:20px;">
  <p class="f-20 text-success">欢迎使用云水族后台</p>
  <p>登录次数：18 </p>
 
  <p>上次登录IP： <?php $user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
                  $user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];echo $user_IP;?>  
  </p>
  <p>
    <?php
    if(!empty($_COOKIE['lastvisit'])){//先判断，是否存在cookie
        echo "您上次访问时间是：".$_COOKIE['lastvisit'];
        @setCookie("lastvisit",date("Y-m-d H:i:s",time()),time()+3600*24*365);
    }else{
        echo "您是第一次登录，欢迎！";
        @setCookie("lastvisit",date("Y-m-d H:i:s",time()),time()+3600*24*365);
    }?>
  </p>
  <div class="myimg">
      <img src="images/logo透明.jpg" alt="" width="110px">
  </div>
  <table class="table table-border table-bordered table-bg">
    <thead>
      <tr>
        <th colspan="7" scope="col">信息统计</th>
      </tr>
      <tr class="text-c">
        <th>统计</th>
        <th>观赏水族</th>
        <th>云水族箱</th>
        <th>产品库</th>
        <th>用户</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-c">
        <td>总数</td>
        <td>92</td>
        <td>9</td>
        <td>0</td>
        <td>8</td>
      </tr>
      <tr class="text-c">
        <td>今日</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr class="text-c">
        <td>昨日</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr class="text-c">
        <td>本周</td>
        <td>2</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr class="text-c">
        <td>本月</td>
        <td>2</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
    </tbody>
  </table>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>

</body>
</html>