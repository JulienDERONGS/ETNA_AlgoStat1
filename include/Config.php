<?php

/**
 * Inheritable singleton
 */
class                       Singleton
{
    private static          $instance = NULL;

    // Prevent any other singleton object to be created
    protected function      __construct() {}
    protected function      __clone() {}
    public function         __wakeup()
    {
        throw new Exception("Unserialization of the singleton forbidden.");
    }

    public static function  getInstance()
    {
        $cls = get_called_class();
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}

/**
 * Config class, getters/setters only
 */
class                       Config extends Singleton
{
  private static            $path;
  private static            $ip;
  private static            $dbname;
  private static            $username;
  private static            $password;

  function                  __construct()
  {
    // TODO: Dev, to comment once the project is finished
    //static::$path = "/srv/http";
    //static::$password = "rootroot";

    static::$dbname = "algostat_db";
    static::$username = "root";

    // TODO: Prod, to uncomment once the project is finished
    static::$path = "/var/www/html/algostat1";

    static::$ip =   "95.85.29.173";
    static::$password = "etnaDev";
  }

  function getPath() {return (static::$path);}

  function getIP() {return (static::$ip);}

  function getDBname() {return (static::$dbname);}

  function getUsername() {return (static::$username);}

  function getPassword() {return (static::$password);}

  // TODO: Setters ?
}
?>
