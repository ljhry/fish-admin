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
  <link type="text/css" rel="stylesheet" href="../css/H-ui.css" />
  <link type="text/css" rel="stylesheet" href="../css/H-ui.admin.css" />
  <link type="text/css" rel="stylesheet" href="../font/font-awesome.min.css" />
  <!--[if IE 7]>
<link href="font/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
  <title>科目管理</title>
</head>

<body>
  <nav class="Hui-breadcrumb">
    <i class="icon-home"></i> 首页
    <span class="c-gray en">&gt;</span> 用户详情管理
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
      title="刷新">
      <i class="icon-refresh"></i>
    </a>
  </nav>
  <div class="pd-20">
    <div class="text-c">

      <!-- <input type="text" class="input-text" style="width:250px" placeholder="输入科目名称" id="" name="">
    <button type="submit" class="btn btn-success" id="" name=""><i class="icon-search"></i> 搜科目</button> -->
      <form class="Huiform" action="/" method="post">
        <input type="hidden" id="hid_ccid" value="">
        <input class="input-text" style="width:250px" type="text" value="" placeholder="输入知识点" id="article-class-val">
        <button type="button" class="btn btn-success" id="" name="" onClick="article_class_add(this);">
          <i class="icon-search"></i> 搜索知识点</button>
      </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
      <!-- <span class="l">
        <a href="javascript:;" onClick="user_add('550','','添加鱼','userdetial-add.html')" class="btn btn-primary radius">
          <i class="icon-plus"></i> 添加鱼</a>
      </span> -->
      <span class="r">共有数据：
        <strong>88</strong> 条</span>
    </div>
    <table class="table table-border table-bordered table-hover table-bg ">
      <thead>
        <tr class="text-c">
          <th width="25">
            <input type="checkbox" name="" value="">
          </th>
          <th width="30">ID</th>
          <th width="100">用户名</th>
          <th width="100">状态</th>
          <th width="200">水族箱</th>
          <th width="100">操作</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-c">
          <td>
            <input type="checkbox" value="1" name="">
          </td>
          <td>1</td>
          <td>user</td>
          <td class="user-status">
            <span class="label label-success">在用</span>
          </td>
          <td>3号水族箱</td>


          <td class="f-14 user-manage">
            <a style="text-decoration:none" href="javascript:;" title="查看" onclick="user_show('4','600','','张三','userdetial-show.html')">
              <i class="icon-eye-open"></i>
            </a>
            <a title="修改" href="javascript:;" onClick="user_edit('4','550','','修改','userdetial-update.html')" class="ml-5" style="text-decoration:none">
              <i class="icon-edit"></i>
            </a>
            <a title="删除" href="javascript:;" onClick="user_del(this,'1')" class="ml-5" style="text-decoration:none">
              <i class="icon-trash"></i>
            </a>

          </td>
        </tr>

      </tbody>
    </table>
    <div id="pageNav" class="pageNav"></div>
  </div>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../layer/layer.min.js"></script>
  <script type="text/javascript" src="../js/pagenav.cn.js"></script>
  <script type="text/javascript" src="../js/H-ui.js"></script>
  <script type="text/javascript" src="../plugin/My97DatePicker/WdatePicker.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../js/H-ui.admin.js"></script>
  <script type="text/javascript">
    window.onload = (function () {
      // optional set
      pageNav.pre = "&lt;上一页";
      pageNav.next = "下一页&gt;";
      // p,当前页码,pn,总页面
      pageNav.fn = function (p, pn) {
        $("#pageinfo").text("当前页:" + p + " 总页: " + pn);
      };
      //重写分页状态,跳到第三页,总页33页
      pageNav.go(1, 13);
    });
    $('.table-sort').dataTable({
      "lengthMenu": false, //显示数量选择 
      "bFilter": false, //过滤功能
      "bPaginate": false, //翻页信息
      "bInfo": false, //数量信息
      "aaSorting": [
        [1, "desc"]
      ], //默认第几个排序
      "bStateSave": true, //状态保存
      "aoColumnDefs": [
        //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
        {
          "orderable": false,
          "aTargets": [0, 4, 5]
        } // 制定列不参与排序
      ]
    });
  </script>
</body>

</html>