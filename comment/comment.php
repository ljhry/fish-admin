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
  <title>科目管理</title>
</head>

<body>
  <nav class="Hui-breadcrumb">
    <i class="icon-home"></i> 首页
    <span class="c-gray en">&gt;</span> 用户评论
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
      title="刷新">
      <i class="icon-refresh"></i>
    </a>
  </nav>
  <div class="pd-20">
    <div class="text-c">
      <form class="Huiform" action="/" method="post">
        <input type="hidden" id="hid_ccid" value="">
        <input class="input-text" style="width:250px" type="text" value="" placeholder="搜索" id="article-class-val">
        <a href='javascript:;' class="btn btn-success" id="" name="" onClick="user_edit( '4', '550', '', '修改','fish-edit.php')" class='ml-5' style='text-decoration:none'>
          <i class="icon-search"></i> 搜索</a>
      </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
      <?php
        include "../public/php/test.php";
        $conn = mysqli_connect("localhost","root","12345678","myfishtank");
        if(!$conn){
          die("连接错误".mysqli_connect_error());
        }
        mysqli_query($conn,"set names utf8");  

        $sql = "select count(*) from comment group by id";
        
        $rst = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($rst);
      
      ?>
        <span class="r">共有评论：
          <strong>
            <?php echo $num;?>
          </strong> 个&nbsp&nbsp</span>
    </div>
    <table class="table table-border table-bordered table-hover table-bg table-sort">
      <thead>
        <tr class="text-c">
          <th width="25">
            <input type="checkbox" name="" value="">
          </th>
          <th width="60">ID</th>
          <th width="100">用户名</th>
          <th width="100">评论内容</th>
          <th width="100">满意度</th>
          <th width="100">评论时间</th>
          <th width="100">操作</th>
        </tr>
      </thead>

      <?php
         $sql1="select comment.*,user.username uname from comment,user where user.id=comment.user_id";
        
         $rst1=mysqli_query($conn,$sql1);
        
         while ($row1=mysqli_fetch_assoc($rst1)) {
          echo '
            <tbody>
              <tr class="text-c">
                <td>
                  <input type="checkbox" value="1" name="">
                </td>';
          echo   "<td>{$row1['id']}</td>";        
          echo   "<td>{$row1['uname']}</td>";
          echo   "<td id='aa'>{$row1['content']}</td>";
          echo   "<td>{$row1['satisfaction']}%</td>";
          echo   "<td>".date('Y-m-d H:i:s',$row1['time'])."</td>";
          echo    "<td class='f-14 user-manage'>";
          echo    "<a style='text-decoration:none' href='javascript:;' onclick=user_show('800','700','','评论','comment-show.php?id={$row1['id']}')>
                    <i class='icon-eye-open'></i>
                  </a>";
          echo    "<a title='删除' href='comment-del.php?id={$row1['id']}'  class='ml-5' style='text-decoration:none' id='a'>
                     <i class='icon-trash'></i>
                  </a>";
                  
          echo  '</td>
              </tr>
            </tbody>';
         }
         mysqli_free_result($rst);
         mysqli_free_result($rst1);
         
         mysqli_close($conn);
      ?>
    </table>
  </div>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../layer/layer.min.js"></script>
  <script type="text/javascript" src="../js/pagenav.cn.js"></script>
  <script type="text/javascript" src="../js/H-ui.js"></script>
  <script type="text/javascript" src="../plugin/My97DatePicker/WdatePicker.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../js/H-ui.admin.js"></script>
  <script type="text/javascript">
  </script>
  <script>
    $("#aa").each(function() {
    if ($(this).text().length > 13) {
        $(this).html($(this).text().replace(/\s+/g, "").substr(0, 13) + "...")
    }
})
    alert(content)
  </script>
</body>

</html>
