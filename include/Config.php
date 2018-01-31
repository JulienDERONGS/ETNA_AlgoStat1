<?php
/**
 * Config class, getters/setters only
 */
class                       Config extends SingletonFactory
{
  private static            $path = "/var/www/html/algostat1";
  private static            $proj_path = "/algostat1";
  private static            $ip = "localhost";
  private static            $dbname ="algostat_db";
  private static            $username = "root";
  private static            $password = "etnaDev";

  function __destruct()
  {
    static::$path = NULL;
    static::$proj_path = NULL;
    static::$ip = NULL;
    static::$dbname = NULL;
    static::$username = NULL;
    static::$password = NULL;
  }

  function getPath()        {return (static::$path);}
  function getProjPath()    {return (static::$proj_path);}
  function getIP()          {return (static::$ip);}
  function getDBname()      {return (static::$dbname);}
  function getUsername()    {return (static::$username);}
  function getPassword()    {return (static::$password);}
}
?>
