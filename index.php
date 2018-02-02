<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AlgoStat1 : Algorithms time and cost comparisons</title>
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans|Roboto+Slab|Ubuntu+Condensed" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
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
