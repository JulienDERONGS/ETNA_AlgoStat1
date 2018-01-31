<?php
  // Initialize singleton classes
  require_once "include/Autoloader.php";
  $autoloader = new Autoloader();
  /////////////// DEBUG
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // TODO: Loading gif if sort takes a long time ?

  // Unset all error POSTs
  if (isset($_POST['processed']))
  {
    unset($_POST['processed']);
  }

  // Incorrect form input -> redirection + error, else sort
  if (isset($_POST["submit"]) && isset($_POST["type"]) &&
  isset($_POST["sequence"]))
  {
    if ($_POST['type'] == "insertion" || $_POST['type'] == "selection" ||
    $_POST['type'] == "bubble")
    {
      try
      {
        $sort = new Sort($_POST['sequence']);
        $clean_seq = $sort->get_clean_data($_POST['sequence']);
      }
      catch (Exception $e)
      {
        $_POST['processed'] = "seq"; // TODO: display err on index.php
        header("Location: index.php");
      }
      // Empty array -> redirection to index
      if (!$clean_seq)
      {
        $_POST['processed'] = "seq"; // TODO: display err on index.php
        header("Location: index.php");
      }
      $_POST['clean_seq['] = $clean_seq;
      $_POST['sorted_seq'] = $sort->sort_by_type($_POST['type'], $clean_seq);
    }
  }
  else
  {
    $_POST['processed'] = "missing_form_attr"; // TODO: display err on index.php
    header("Location: index.php");
  }

  // TODO: Have to go through all unsets after sorting and before leaving
  if (isset($_POST['submit']))    { unset($_POST['submit']); }
  if (isset($_POST['type']))      { unset($_POST['type']); }
  if (isset($_POST['sequence']))  { unset($_POST['sequence']); }
  $_POST['processed'] = "ok";
  header("Location: index.php");

  // Let DB class add results to the db
?>
