<?php
/**
 * Database connexion class
 */
class             DB extends Singleton
{
  private         $ip;
  private         $username;
  private         $password;

  function        __construct()
  {
    require_once "include/Autoloader.php";
    $autoloader = new Autoloader();
    $config = Config::getInstance();

    static::$ip = $config.getIP();
    static::$ip = $config.getUsername();
    static::$ip = $config.getPassword();
  }

  function        connect()
  {

  }
}
?>
