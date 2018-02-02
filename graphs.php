<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>AlgoStat1 : Algorithms time and cost comparisons</title>
      <link href="styles/style.css" rel="stylesheet" type="text/css">
      <script src="include/js/echarts.js"></script>
      <?php
        // Initialize classes and session
        session_start();
        require_once "include/Autoloader.php";
        $autoloader = new Autoloader();
        $config = Config::getInstance();
        $db = DB::getInstance();
        $db->connect();
        /////////////// DEBUG
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        ///////////////
        ?>
  </head>
  <div class="wrapper">
    <div class="header">
      <a href="index.php">SORT</a>
      <a href="graphs.php">GRAPHS</a>
    </div>
  </div>
  <body>
    <div class="push"></div>

    <!-- prepare a DOM container with width and height -->
  <div id="graphs" style="width: 800px;height:600px;"></div>
  <script type="text/javascript">

  // based on prepared DOM, initialize echarts instance
  var myChart = echarts.init(document.getElementById('graphs'));
  option =
  {
    title: {
        text: 'Time / numbers in sequence'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['data1', 'test2', 'test3']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['cat1','cat2','cat3', 'cat4']
    },
    yAxis: {
        type: 'value'
    },
    series: [
    {
        data: [820, 932, 901, 934, 1290, 1330, 1320],
        type: 'line',
        smooth: true
    },
    {
        data: [600, 932, 901, 994, 1290, 1330, 1220],
        type: 'line',
        smooth: true
    },
    {
        data: [700, 932, 1001, 769, 1290, 1330, 1220],
        type: 'line',
        smooth: true
    }
    ]
};
        // use configuration item and data specified to show chart
        myChart.setOption(option);
  </script>
  <?php $db->getTimesBySortType("insertion"); ?>
  </body>
</html>
