<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AlgoStat1 : Algorithms time and cost comparison</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="styles/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="algo_form">
      <form action="/process.php" method="post">
        Sort type :</br>
        <select name="type">
          <option value="insert">Insertion</option>
          <option value="select">Selection</option>
          <option value="bubble">Bubble</option>
        </select></br></br>
        Numbers to sort:</br>
        <textarea name="comment" rows="5" cols="40">Bla</textarea></br></br>
        <input type="submit" name="submit" value="Sort">
      </form>
    </div>
  </body>
</html>
