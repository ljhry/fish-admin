<?php
  include '../public/php/config.php';
  $id = $_GET['id'];
  
  $sql="select * from fish where id={$id}";
  $rst = mysqli_query($conn,$sql);
  @$row=mysqli_fetch_assoc($rst);

?>
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

  <title>修改品种</title>
  <style>
    body {
      min-height: 200px;
      font-size: 14px;
    }

    td,
    th {
      font-size: 14px;
    }

    input[type="text"] {
      padding: 5px 5px;
      font-size: 14px;
    }
    ::-webkit-file-upload-button {
      padding: .4em;
      line-height: 20px;
      border: 1px solid #92dff7;
      background: rgb(255, 255, 255);
      color: #1a90df;
      width: 60px;
      box-shadow: 3px 3px 5px #888;
      border-radius: 3px;
    }
    .myimg {
      box-shadow: 3px 3px 8px #888;
      width: 50px;
      position: relative;
      margin-top: 15px;
    }
    input,select{
      color: #555;
      background-color: #fff;
      border: solid 0px #ddd;
    }
    textarea{
      width: 212px;
      height: 150px;
      border: 1px solid #b3b3b3;
      resize: none;
    }
 
  </style>
</head>

<body>
  <div class="pd-20"></div>
    <div class="Huiform">
      <form action="fish-update.php" method="post" enctype="multipart/form-data">
        <table class="table table-bg">
          <tbody>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 名称 ：</th>
              <td>
                <input type="text" style="width:200px" class="input-text" placeholder="名称" id="name" name="fishname" value="<?php echo $row['name']?>">
              </td>
            </tr>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> PH ：</th>
              <td>
                <input type="text" style="width:200px" class="input-text" placeholder=" PH" id="name" name="fishph" value="<?php echo $row['ph']?>">
              </td>
            </tr>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 温度 ：</th>
              <td>
                <input type="text" style="width:200px" class="input-text" placeholder="温度" id="name" name="fishtem" value="<?php echo $row['tem']?>">
              </td>
            </tr>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 喂食间隔 ：</th>
              <td>
                <input type="text" style="width:200px" class="input-text" placeholder="喂食间隔" id="name" name="fishfeed" value="<?php echo $row['feed']?>">
              </td>
            </tr>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 水过滤间隔 ：</th>
              <td>
                <input type="text" style="width:200px" class="input-text" placeholder=" 水过滤间隔 " id="name" name="fishe" value="<?php echo $row['wfilter']?>">
              </td>
            </tr>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 加氧间隔 ：</th>
              <td>
                <input type="text" style="width:200px" class="input-text" placeholder="加氧间隔" id="name" name="fisho" value="<?php echo $row['oxygen']?>">
              </td>
            </tr>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 换水间隔 ：</th>
              <td>
                <input type="text" style="width:200px" class="input-text" placeholder="换水间隔" id="name" name="fishw" value="<?php echo $row['wexchange']?>">
              </td>
            </tr>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 简单介绍 ：</th>
              <td>
                <textarea name="detail" id="" cols="30" rows="10"><?php echo $row['detail']?></textarea> 
              </td>
            </tr>
            <!--  -->
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 原图：</th>
              <td>
                <div class="myimg">
                  <img id="" src="../uploads/<?php echo $row['img']?>" data-holder-rendered="true" style="width: 50px">
                </div>
            </tr>
            
              <th width="100" class="text-r">
                <span class="c-red">*</span> 更改后：</th>
              <td>
              <input type="file" name="img" id="zx_img" value="上传图片">
                
              <div class="myimg">
                  <img id="img_preview" data-src="" data-holder-rendered="true" style="width: 50px; display: block;">
                </div>
              </td>
            </tr>
            <tr>
              <th></th>
              <td>
                <button class="btn btn-success radius" type="submit">
                  <i class="icon-ok"></i> 提交</button>
              </td>
            </tr>
          </tbody>
        </table>
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <input type="hidden" name="imgsrc" value="<?php echo $row['img']?>">
      </form>
      <?php
        mysqli_free_result($rst);
        mysqli_close($conn);
      ?>
  </div>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/H-ui.js"></script>
  <script type="text/javascript" src="../js/H-ui.admin.js"></script>
  <script type="text/javascript">
    //上传图片选择文件改变后刷新预览图
    $("#zx_img").change(function (e) {
      //获取目标文件
      var file = e.target.files || e.dataTransfer.files;
      //如果目标文件存在
      if (file) {
        //定义一个文件阅读器
        var reader = new FileReader();
        //文件装载后将其显示在图片预览里
        reader.onload = function () {
          $("#img_preview").attr("src", this.result);
        }
        //装载文件
        reader.readAsDataURL(file[0]);
      }
    });
  </script>

</body>

</html>