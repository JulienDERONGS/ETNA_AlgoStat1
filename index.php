<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AlgoStat1 : Algorithms time and cost comparison</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <?php
    require_once  "include/Autoloader.php";
    $autoloader = new Autoloader();
    $config =     new Config();
    ?>
  </head>

  <body>
    <div class="algo_form">
      <form action=<?php $config->getPath() . "/include/process.php" ?> method="post">
        Sort type :</br>
        <select name="type">
          <option value="insert">Insertion</option>
          <option value="select">Selection</option>
          <option value="bubble">Bubble</option>
        </select></br></br>
        Iterations (1 to 50) :</br>
        <input type="number" name="iter" min="1" max="50"></br></br>
        Numbers to sort :</br>
        <textarea name="comment" rows="5" cols="40">Bla</textarea></br></br>
        <input type="submit" name="submit" value="Sort">
      </form>
    </div>
    <div class="debug">
      <?php
        $sort = new Sort("cjebc33.3e4 r'8 ,,3,2;;-9.0-1");
        $sort->get_clean_data();
      ?>
    </div>
  </body>
</html>
