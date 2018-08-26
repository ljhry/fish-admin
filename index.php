<?php
  session_start();
  if(!$_SESSION['login']){
    header("location:login.html");
}
?>
<!DOCTYPE HTML>
<html style="overflow-y:hidden;">

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <LINK rel="Bookmark" href="/favicon.ico">
  <LINK rel="Shortcut Icon" href="/favicon.ico" />

  <link href="css/H-ui.css" rel="stylesheet" type="text/css" />
  <link href="css/H-ui.admin.css" rel="stylesheet" type="text/css" />
  <link type="text/css" rel="stylesheet" href="font/font-awesome.min.css" />

  <title>云水族</title>
</head>

<body style="overflow:hidden">
  <header class="Hui-header cl">
    <a class="Hui-logo l" href="#">云水族箱</a>
    <span class="Hui-subtitle l">V1.0</span>
    <span class="Hui-userbox">
      <span class="c-white">超级管理员：admin</span>
      <a class="btn btn-out radius ml-10" href="public/php/logout.php" title="退出">
        <i class="icon-off"></i> 退出</a>
    </span>
    <a aria-hidden="false" class="Hui-nav-toggle" id="nav-toggle" href="#"></a>
  </header>
  <div class="cl Hui-main">
    <aside class="Hui-aside" style="">
      <input runat="server" id="divScrollValue" type="hidden" value="" />
      <div class="menu_dropdown bk_2">
        <dl id="menu-user">
          <dt>
            <a _href="user/user.php" href="javascript:;">
              <i class="icon-user"></i> 用户管理
              <b></b>
            </a>
          </dt>
        </dl>
        <dl id="menu-comments">
          <dt>
            <a _href="fish/fish.php" href="javascript:;">
              <i class="icon-rocket"></i> 水族饲养解决方案
              <b></b>
            </a>
          </dt>
        </dl>
        <dl id="menu-article">
          <dt>
            <a _href="fishtank/fishtank.php" href="javascript:void(0)">
              <i class="icon-backward"></i> 云水族箱列表
              <b></b>
            </a>
          </dt>

        </dl>
        <dl id="menu-picture">
          <dt>
            <a _href="userdetial/userdetial.php" href="javascript:void(0)">
              <i class="icon-calendar"></i> 用户详情
              <b></b>
            </a>
          </dt>

        </dl>


        <dl id="menu-admin">
          <dt>
            <a _href="user/user-password-edit.php" href="javascript:void(0)">
              <i class="icon-key"></i> 更改密码
              <b></b>
            </a>
          </dt>

        </dl>
        <dl id="menu-system">
          <dt>
            <a _href="comment/comment.php" href="javascript:void(0)">
              <i class="icon-cogs"></i> 水族箱社区
              <b></b>
            </a>
          </dt>
          </a>
        </dl>
      </div>
    </aside>
    <div class="dislpayArrow">
      <a class="pngfix" href="javascript:void(0);"></a>
    </div>
    <section class="Hui-article">
      <div id="Hui-tabNav" class="Hui-tabNav">
        <div class="Hui-tabNav-wp">
          <ul id="min_title_list" class="acrossTab cl">
            <li class="active">
              <span title="我的桌面" data-href="welcome.html">我的桌面</span>
              <em></em>
            </li>
          </ul>
        </div>
        <div class="Hui-tabNav-more btn-group">
          <a id="js-tabNav-prev" class="btn radius btn-default btn-small" href="javascript:;">
            <i class="icon-step-backward"></i>
          </a>
          <a id="js-tabNav-next" class="btn radius btn-default btn-small" href="javascript:;">
            <i class="icon-step-forward"></i>
          </a>
        </div>
      </div>
      <div id="iframe_box" class="Hui-articlebox">
        <div class="show_iframe">
          <div style="display:none" class="loading"></div>
          <iframe scrolling="yes" frameborder="0" src="welcome.php"></iframe>
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
  <script type="text/javascript" src="layer/layer.min.js"></script>
  <script type="text/javascript" src="js/H-ui.js"></script>
  <script type="text/javascript" src="js/H-ui.admin.js"></script>

</body>

</html>