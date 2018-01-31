<?php
  // Initialize singleton classes
  require_once "include/Autoloader.php";
  $autoloader = new Autoloader();
  /////////////// DEBUG
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  /* TODO: halp del
  <form action="/include/process.php" method="post">
    Sort type :</br>
    <select name="type">
      <option value="insertion">Insertion</option>
      <option value="selection">Selection</option>
      <option value="bubble">Bubble</option>
    </select></br></br>
    Numbers to sort :</br>
    <textarea name="sequence" rows="10" cols="80">Any character can be written here, only integers and floats will be treated.&#13;&#10;Sequence exemple : cjebc33.3e4 r'8 ,,3,2;;-9.0-1</textarea></br></br>
    <input type="submit" name="submit" value="Sort">
  </form>
  */

  // TODO: Loading gif
  // Unset all error POSTs
  if (isset($_POST['err']))
  {
    unset($_POST['err']);
  }

  // Missing form input from user -> redirection + error, else sort
  if (isset($_POST["submit"]) && isset($_POST["type"]) && isset($_POST["sequence"]))
  {
    if ($_POST['type'] == "insertion" || $_POST['type'] == "selection" || $_POST['type'] == "bubble")
    {
      try
      {
        $sort = new Sort($_POST['sequence']);
        $clean_seq = $sort->get_clean_data($_POST['sequence']);
      }
      catch (Exception $e)
      {
        $_POST['err'] = "seq"; // TODO: display err on index.php
        header("Location: index.php");
      }
      // Empty array -> redirection to index
      if (!$clean_seq)
      {
        $_POST['err'] = "seq"; // TODO: display err on index.php
        header("Location: index.php");
      }
      $_POST['clean_seq['] = $clean_seq;
      $_POST['sorted_seq'] = $sort->sort_by_type($_POST['type'], $clean_seq);
    }
  }
  else
  {
    $_POST['err'] = "missing_form_attr"; // TODO: display err on index.php
    header("Location: index.php");
  }



  if (isset($_POST['submit']))
  {
    unset($_POST['submit']);
  }
  if (isset($_POST['type']))
  {
    unset($_POST['type']);
  }
  if (isset($_POST['sequence']))
  {
    unset($_POST['sequence']);
  }
?>
