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
    input,
    select,
    textarea {
      color: #555;
      background-color: #fff;
      border: solid 0px #ddd;
    }
 
  </style>
</head>

<body>
<?php
    include "../public/php/config.php";
    $id=$_GET['id'];
    $sql = "select *from userdet where id={$id}";
    $rst = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($rst);

    $sql1 = "select *from fishtank";
    $rst1 = mysqli_query($conn,$sql1);

    $sql2 = "select *from fish";
    $rst2 = mysqli_query($conn,$sql2);

?>
  <div class="pd-20"></div>
    <div class="Huiform">
      <form action="userdetial-update.php" method="post" enctype="multipart/form-data">
        <table class="table table-bg">
          <tbody>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 水族箱：</th>
              <td>
                <select name="fishtank_id" class="select l" required="required">
                    <?php               
                        while($row1=mysqli_fetch_assoc($rst1)){
                            if($row1['id']==$row['fishtank_id']){
                                echo "<option value='{$row1['id']}' selected>{$row1['name']}</option>";                           
                            }else{
                                echo "<option value='{$row1['id']}'>{$row1['name']}</option>";                           
                            }                       
                        }                  
                    ?>
                </select>
              </td>
            </tr>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 观赏鱼：</th>
              <td>
              <select name="fish_id" class="select l" required="required">
                    <?php               
                        while($row2=mysqli_fetch_assoc($rst2)){
                            if($row2['id']==$row['fish_id']){
                                echo "<option value='{$row2['id']}' selected>{$row2['name']}</option>";                           
                            }else{
                                echo "<option value='{$row2['id']}'>{$row2['name']}</option>";                           
                            }
                        }                       
                    ?>
                </select>
              </td>
            </tr>
            <tr>
              <th width="100" class="text-r">
                <span class="c-red">*</span> 用户状态：</th>
              <td>
              <?php
                    if($row['status']){
                ?>
                        <label><input type="radio"  id="" name="status" value='1' checked>正式用户</label>
                        <label><input type="radio" id=""  name="status" value='0'>体验用户</label>
                <?php
                    }else{
                ?>
                        <label><input type="radio"  id="" name="status" value='1'>正式用户</label>
                        <label><input type="radio" id=""  name="status" value='0' checked>体验用户</label>
                <?php
                    }
                ?>
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
      </form>
      <?php
        mysqli_free_result($rst);
        mysqli_free_result($rst1);
        mysqli_free_result($rst2);
        mysqli_close($conn);
      ?>
  </div>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/H-ui.js"></script>
  <script type="text/javascript" src="../js/H-ui.admin.js"></script>

</body>

</html>