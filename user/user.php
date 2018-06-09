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

  <title>管理员列表</title>
</head>

<body>
 
  <nav class="Hui-breadcrumb">
    <i class="icon-home"></i> 首页
    <span class="c-gray en">&gt;</span> 用户管理
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
      title="刷新">
      <i class="icon-refresh"></i>
    </a>
  </nav>
  <?php
   ini_set('date.timezone','Asia/Shanghai');
   $conn = mysqli_connect("localhost","root","12345678","myfishtank");
   $sql1 = "select count(*) from user group by id";
   
   $rst1 = mysqli_query($conn,$sql1);
   $num = mysqli_num_rows($rst1)-1;
  ?>
  <div class="pd-20">
    <div class="text-c">
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
    <span><b>用户列表<b></span>
      <span class="r">共有用户：
        <strong><?php echo $num;?></strong>&nbsp&nbsp个</span>
    </div>
    <table class="table table-border table-bordered table-bg">
      <thead>
        <!-- <tr>
          <th scope="col" colspan="7">用户列表</th>
        </tr> -->
        <tr class="text-c">
          <th width="25">
            <input type="checkbox" name="" value="">
          </th>
          <th width="50">ID</th>
          <th width="150">用户名</th>
          <th>密码</th>
          <th width="150">注册时间</th>
          <th width="150">操作</th>
        </tr>
      </thead>
      </table>
  
      <?php
     
      if(!$conn){
        die("连接错误".mysqli_connect_error());
      }
      $sql="select * from user where isadmin=0";
      
      $rst=mysqli_query($conn,$sql);
     
      //取出所有数据
      while ($row=mysqli_fetch_assoc($rst)) {      
          echo "<table class='table table-border table-bordered table-bg'>";
          echo "<tbody>";
          echo "<tr class='text-c'>";
          echo "<td width='25'>";
          echo   "<input type='checkbox' value='1' name=''>";
          echo "</td>";
          echo "<td width='50'>{$row['id']}</td>";
          echo "<td width='150'>{$row['username']}</td>";
          echo "<td>{$row['password']}</td>";
          echo "<td width='150'>".date('Y-m-d H:i:s',$row['time'])."</td>";
          echo "<td class='f-14 admin-manage' width='150'>";
          echo "<a title='删除' href='del.php?id={$row['id']}' class='ml-5' style='text-decoration:none'><i class='icon-trash'></i></a>";
          echo "</td>";
          echo "</tr>";
          echo "</tbody>";
          echo "</table>";
      }      
      mysqli_free_result($rst);
      mysqli_free_result($rst1);
      
      mysqli_close($conn);
  ?>
  </div>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../layer/layer.min.js"></script>
  <script type="text/javascript" src="../js/pagenav.cn.js"></script>
  <script type="text/javascript" src="../js/H-ui.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../js/H-ui.admin.js"></script>

</body>
</html>