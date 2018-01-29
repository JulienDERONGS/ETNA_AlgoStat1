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
      /////////////// DEBUG
      var_dump($config->getIP());
      var_dump($config->getPath());
      var_dump($config->getDBname());
      var_dump($config->getUsername());
      var_dump($config->getPassword());
      ///////////////
      $db = DB::getInstance();
      $db->connect(); //DEBUG
      $db->test();
      //var_dump($db->());
      //var_dump($config->getIP());
    ?>
  </head>

  <body>
    <div class="algo_form">
      <form action="/include/process.php" method="post">
        Sort type :</br>
        <select name="type">
          <option value="insert">Insertion</option>
          <option value="select">Selection</option>
          <option value="bubble">Bubble</option>
        </select></br></br>
        Iterations (??1 to 50??) :</br>
        <input type="number" name="iter" min="1" max="50"></br></br>
        Numbers to sort :</br>
        <textarea name="sequence" rows="5" cols="40">cjebc33.3e4 r'8 ,,3,2;;-9.0-1</textarea></br></br>
        <input type="submit" name="submit" value="Sort">
      </form>
    </div>
    <div class="debug">
      <?php
        $sort = new Sort("cjebc33.3e4 r'8 ,,3,2;;-9.0-1");
        $sort->get_clean_data();
        $db->connect();
      ?>
    </div>
  </body>
</html>
