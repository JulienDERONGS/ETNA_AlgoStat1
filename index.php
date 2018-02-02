<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AlgoStat1 : Algorithms time and cost comparisons</title>
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans|Roboto+Slab|Ubuntu+Condensed" rel="stylesheet"> 
    <link href="styles/style.css" rel="stylesheet" type="text/css">
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
  <body>
    <!-- Header -->
    <div class="wrapper">
      <div class="header">
        <a href="index.php">SORT</a>
        <a href="graphs.php">GRAPHS</a>
      </div>
    </div>
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

    <div class="sort_error">
      <?php
      var_dump($_SESSION); //DEBUG
      if (isset($_SESSION['error'])) // Display error if there was one during sequence processing
      {
        echo ($_SESSION['error']); // Else display statistics
      }
      else // AF
      {
        # code...
      }
      session_unset();
      session_destroy();
      ?>
    </div>
  </body>
</html>
