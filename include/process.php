<?php
/* TODO: REMINDER -> To del
<option value="insert">Insertion</option>
<option value="select">Selection</option>
<option value="bubble">Bubble</option>
*/

require_once "Autoloader.php";
$autoload = new Autoloader();
$config = Config::getInstance();

// Unset all error POSTs
unset($_POST['err']);

if (!$_POST["submit"] || !$_POST["type"] || !$_POST["iter"] || !$_POST["sequence"])
{
  $_POST['err'] = "form_missing"; // TODO: display err on index.php
  header("Location: " . $config->getPath() . "/index.php");
}




// TODO: unset POST
?>
