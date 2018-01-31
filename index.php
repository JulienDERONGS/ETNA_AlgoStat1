<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AlgoStat1 : Algorithms time and cost comparison</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="styles/style.css" rel="stylesheet" type="text/css">
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
      var_dump($config->getIP());
      var_dump($config->getPath());
      var_dump($config->getDBname());
      var_dump($config->getUsername());
      var_dump($config->getPassword());
      ///////////////
    ?>
  </head>

  <body>
    <div class="algo_form">
      <form action="<?php echo $config->getProjPath() ?>/process.php" method="post">
        Sort type :</br>
        <select name="type">
          <option value="insertion">Insertion</option>
          <option value="selection">Selection</option>
          <option value="bubble">Bubble</option>
        </select></br></br>
        Sequence of numbers to sort :</br>
        <textarea name="sequence" rows="10" cols="80">Any character can be written here, only integers and floats will be treated.&#13;&#10;Sequence exemple : cjebc33.3e4 r'8 ,,3,2;;-9.0-1</textarea></br></br>
        <input type="submit" name="submit" value="Sort">
      </form>
    </div>

    <!-- TODO: DEBUG -->
    <div class="debug">
      <?php
        $sort = new Sort("cjebc33.3e4 r'8 ,,3,2;;-9.0-1");
        $clean_data = $sort->get_clean_data();
        echo "\n";

        $test_array = array();
        echo "</br>Original Array :</br>";
        print_r($clean_data);
        echo "</br>Sorted Array :</br>";
        print_r($sort->sort_by_type("insertion", $clean_data));
      ?>
    </div>
  </body>
</html>
