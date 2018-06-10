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
  <title>修改密码</title>
</head>

<body>
  <div class="pd-10">
    <form class="" id="loginform" action="user-update-pass.php" method="post">
      <table class="table table-border table-bordered table-bg">
        <thead>
          <tr>
            <th colspan="2">修改密码</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="text-r" width="30%">用户名：</th>
            <td>
              <input name="username" class="input-text" type="test" autocomplete="off" tabindex="1"
                datatype="*6-16" value="admin" disabled>
            </td>
          </tr>
          <tr>
            <th class="text-r">新密码：</th>
            <td>
              <input name="password" id="password" class="input-text" type="password" autocomplete="off" placeholder="设置新密码"
                tabindex="2" datatype="*6-16"  >
            </td>
          </tr>
          <tr>
            <th></th>
            <td>
              <button type="submit" class="btn btn-success radius" id="admin-password-save" name="admin-password-save">
                <i class="icon-ok"></i> 确定</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- <script type="text/javascript">
    $(".Huiform").Validform();
  </script> -->

</body>

</html>