<?php
/* TODO: halp
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
$config = Config::getInstance();

// Unset all error POSTs
unset($_POST['err']);

// Missing form input from user -> redirection + error
if (!$_POST["submit"] || !$_POST["type"] || !$_POST["iter"] || !$_POST["sequence"])
{
  $_POST['err'] = "form_missing"; // TODO: display err on index.php
  header("Location: " . $config->getPath() . "/index.php");
}
else
{
  if ()
}



// TODO: unset POST
?>
