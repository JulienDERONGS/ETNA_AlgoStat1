<?php
  // Initialize session
  if ($_SESSION)
  {
    session_unset();
    session_destroy();
  }
  session_start();
  $_SESSION['error'] = NULL;
  $_SESSION['clean_seq'] = NULL;
  $_SESSION['sorted_seq'] = NULL;

  require_once "include/Autoloader.php";
  $autoloader = new Autoloader();

  // Incorrect form input -> redirection + error, else sort
  if (isset($_POST["submit"]) && isset($_POST["type"]) &&
  isset($_POST["sequence"]))
  {
    if ($_POST['type'] == "insertion" || $_POST['type'] == "selection" ||
    $_POST['type'] == "bubble")
    {
      try
      {
        // Sanitize user input & clean it for future sorting
        $sort = new Sort($_POST['sequence']);
        $clean_seq = $sort->get_clean_data();
      }
      catch (Exception $e)
      {
        $_SESSION['error'] = $e->getMessage();
        header("Location: index.php");
      }
      if (!$clean_seq) // empty user sequence
      {
        $_SESSION['error'] = "Please enter a correct sequence of numbers.";
        header("Location: index.php");
      }
      else // start sorting
      {
        $_SESSION['clean_seq'] = $clean_seq;
        $_SESSION['sorted_seq'] = $sort->sort_by_type($_POST['type'], $clean_seq);
      }
      if (!$_SESSION['sorted_seq'])
      {
        $_SESSION['error'] = "Clean sequence became empty during sorting.";
        header("Location: index.php");
      }
    }
    else // wrong sort type
    {
      $_SESSION['error'] = "Wrong sort type.";
      header("Location: index.php");
    }
  }
  else // empty form element
  {
    $_SESSION['error'] = "Empty form element, please fill them all.";
    header("Location: index.php");
  }

  // Let DB class add results to the db
  $db = DB::getInstance();
  $db->connect();
  $db->add_data($sort, $_POST['type']);

  if (isset($_POST['submit']))    { unset($_POST['submit']); }
  if (isset($_POST['type']))      { unset($_POST['type']); }
  if (isset($_POST['sequence']))  { unset($_POST['sequence']); }
  header("Location: index.php");
?>
