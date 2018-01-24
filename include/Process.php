<?php
/* TODO: REMINDER -> To del
<option value="insert">Insertion</option>
<option value="select">Selection</option>
<option value="bubble">Bubble</option>
*/

if (!$_POST["submit"] && false)
{
  require_once "/include/autoloader.php";
  $autoload = new Autoloader();
  $config = new Config();
  header("Location: " . $config->path . "index.php");
}

?>
