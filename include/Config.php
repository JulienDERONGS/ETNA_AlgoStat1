<?php

/**
 * Inheritable singleton
 */
class                       Singleton
{
    private static          $instances = array();

    // Prevent any other singleton object to be created
    protected function      __construct() {}
    protected function      __clone() {}
    public function         __wakeup()
    {
        throw new Exception("Unserialization of the singleton forbidden.");
    }

    public static function  getInstance()
    {
        $cls = get_called_class(); // Late-static-bound class name
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static;
        }
        return self::$instances[$cls];
    }
}

/**
 * Config class, get/set only
 */
class                       Config extends Singleton
{
  private static            $path;
  private static            $ip;

  function                  __construct()
  {
    // TODO: Dev, to comment once the project is finished
    $path =  "/srv/http";
    $ip =    "localhost";

    // TODO: Prod, to uncomment once the project is finished
    //$path = "/var/www/html/algostat1";
    //$ip =   "95.85.29.173";
  }

  function                  getPath()
  {
    return (self::$path);
  }
}
?>
