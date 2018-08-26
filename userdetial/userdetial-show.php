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
<link type="text/css" rel="stylesheet" href="../css/H-ui.css"/>
<link type="text/css" rel="stylesheet" href="../css/H-ui.admin.css"/>
<link type="text/css" rel="stylesheet" href="../font/font-awesome.min.css"/>
<style>
  .header{
    font-size:16px;
    color:#222;
    text-align:left;
    width:100%;
    background-color:#f5fafe;

  }
</style>
<title>知识点管理</title>
</head>
<body>
<?php
   $conn = mysqli_connect("localhost","root","12345678","myfishtank");
   if(!$conn){
     die("连接错误".mysqli_connect_error());
   }
   mysqli_query($conn,"set names utf8");  

   $id=$_GET['id'];

   $sql = "select *from userdet where id={$id}";
   $rst = mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($rst);

   $sql1 = "select *from fishtank where id={$row['fishtank_id']}";
   $rst1 = mysqli_query($conn,$sql1);
   $row1=mysqli_fetch_assoc($rst1);

   $sql2 = "select *from fish where id={$row['fish_id']}";
   $rst2 = mysqli_query($conn,$sql2);
   $row2=mysqli_fetch_assoc($rst2);

   $sql3 = "select user.*,userdet.fish_num fnum from user,userdet where user.id=userdet.user_id and userdet.id={$id}";
   $rst3 = mysqli_query($conn,$sql3);
   $row3=mysqli_fetch_assoc($rst3);

?>
<div class="pd-20 text-c">
  <div class="article-class-list cl">
    <table class="table table-border table-bordered table-hover table-bg">
      <thead>
        <tr class="text-c">
          <th width="120">水族箱</th>
          <th width="120">观赏水族</th>
          <th width="80">种类</th>
          <th width="50">数量</th>
        </tr>
      </thead>
      <tbody>
        <div class="header">
        <p>用户名：<?php echo $row3['username']?></p>
        </div>
        <tr class="text-c">
          <td><?php echo "<img src='../uploads/{$row1['img']}' width='100px'>"?></td>
          <td><?php echo "<img src='../uploads/{$row2['img']}' width='80px'>"?></td>
          <td><?php echo $row2['name']?></td>
          <td><?php echo $row3['fnum']?></td>
        </tr>
        
    <?php
    mysqli_free_result($rst);
    mysqli_free_result($rst1);
    mysqli_free_result($rst2);
    
    mysqli_close($conn);
  ?>
      </tbody>
    </table>
    <div class="a" id="container" style="width: 550px; height: 300px;"></div>
  </div>
</div>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/Validform_v5.3.2_min.js"></script> 
<script type="text/javascript" src="../layer/layer.min.js"></script>
<script type="text/javascript" src="../js/H-ui.js"></script>
<script type="text/javascript" src="../js/H-ui.admin.js"></script>
<script type="text/javascript" src="../js/highcharts.js"></script>

</body>
<script type="text/javascript">
    var storage = window.localStorage;
    var json = '';
    var jsonObj = '';
    setInterval(function () {
        $.ajax({
            url: 'http://127.0.0.1:8088',
            dataType: "json",
            type: 'get',
            data: {
                test: 'ajax'
            },
            // async: false,
            success: function (data) {
                var obj = JSON.stringify(data);
                storage.setItem("man", obj);
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error.message);
                $('#lblResponse').html('Error connecting to the server.');
            },
        })
    }, 50)
    var chart = {
        type: 'spline',
        // plotBackgroundImage: '../images/体温.png',
        animation: Highcharts.svg, // don't animate in IE < IE 10.
        marginRight: 10,
        events: {
            load: function () {
                // set up the updating of the chart each second
                var series = this.series[0];

                setInterval(function () {
                    var json = storage.getItem("man");
                    var jsonObj = JSON.parse(json);
                    var x = (new Date()).getTime(), // current time
                        y = parseFloat(jsonObj.temp);
                    series.addPoint([x, y], true, true);
                }, 1000)
            }
        }
    };
    var title = {
        text: '云水族温度',
    };
    var xAxis = {
        type: 'datetime',
        tickPixelInterval: 150
    };
    var yAxis = {
        title: {
            text: '云水族健康参数'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }],
        tickAmount: 10
    };
    var tooltip = {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
            '<b>'+'时间:'+'</b>'+Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                '<b>'+'参数:'+'</b>' + Highcharts.numberFormat(this.y, 2) + '';
        }
    };
    var plotOptions = {
        area: {
            pointStart: 1940,
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    };
    var legend = {
        enabled: false
    };
    var exporting = {
        enabled: false
    };
    var series = [{
        name: '具体数据:',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;
            for (i = -19; i <= 0; i += 1) {
                data.push({
                    x: time + i * 1000,
                    y: 0
                });
            }
            return data;
        }())
    }];

    var json = {};
    json.chart = chart;
    json.title = title;
    json.tooltip = tooltip;
    json.xAxis = xAxis;
    json.yAxis = yAxis;
    json.legend = legend;
    json.exporting = exporting;
    json.series = series;
    json.plotOptions = plotOptions;


    Highcharts.setOptions({
        global: {
            useUTC: false
        }
    });
    $('#container').highcharts(json);
    $('.highcharts-credits').hide();
//-----------------------------------------------------------------------------------

</script>
</html>