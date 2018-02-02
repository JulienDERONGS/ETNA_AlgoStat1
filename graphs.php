<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>AlgoStat1 : Algorithms time and cost comparisons</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <script src="echarts.min.js"></script>
    <?php
      // Initialize singleton classes
      require_once "include/Autoloader.php";
      $autoloader = new Autoloader();
      $config = Config::getInstance();
      $db = DB::getInstance();
      $db->connect();
      /////////////// DEBUG
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      ?>
</head>
<div class="wrapper">
  <div class="header">
    <a href="index.php">SORT</a>
    <a href="graphs.php">GRAPHS</a>
  </div>
</div>
<body>
    <!-- preparing a DOM with width and height for ECharts -->
    <div id="main" style="width: 600px;height:400px;"></div>
</body>
</html>
