<?php
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

$config = Config::getInstance();

// Unset all error POSTs
unset($_POST['err']);

// Missing form input from user -> redirection + error, else sort
if ($_POST["submit"] && $_POST["type"] && $_POST["sequence"])
{
  if ($_POST['type'] == "insertion" || $_POST['type'] == "selection" || $_POST['type'] == "bubble")
  {
    try
    {
      $sort = new Sort($_POST['sequence'];
      $clean_seq = $sort->get_clean_data($_POST['sequence']) // here
    }
    catch (Exception $e)
    {
      $_POST['err'] = "seq"; // TODO: display err on index.php
      header("Location: index.php");
    }
  }
}
else
{
  $_POST['err'] = "missing_form_attr"; // TODO: display err on index.php
  header("Location: index.php");
}


unset($_POST['submit']);
unset($_POST['type']);
unset($_POST['sequence']);
?>
