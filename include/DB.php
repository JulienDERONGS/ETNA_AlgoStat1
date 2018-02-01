<?php
/**
 * Database connexion and requests class
 */
// TODO: destructor!
class             DB extends SingletonFactory
{
  private static  $isConnected = false;
  private static  $conn = NULL;

  function        connect()
  {
    if (!static::$isConnected)
    {
      try
      {
        $config = Config::getInstance();
        $conn = new PDO("mysql:host=". $config->getIP() .";dbname=". $config->getDBname(), $config->getUsername(), $config->getPassword());
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        static::$conn = $conn;
        static::$isConnected = true;
        return ($conn);
      }
      catch (PDOException $e)
      {
        echo "Error: ". $e->getMessage();
        return (NULL);
      }
    }
    else
    {
      return (static::$conn);
    }
  }

  // Add stats of the last run sort into the DB
  function        add_data($sort, $sort_type_name)
  {
    try
    {
      $conn = $this->connect();
      $stmt = $conn->prepare("SELECT  `sort_type_id`
                              FROM    `Sort_type`
                              WHERE   `sort_type_name` = :sort_type_name
                              LIMIT   1
                              ");
      $stmt->bindParam(":sort_type_name", $sort_type_name, PDO::PARAM_STR);
      $stmt->execute();
      $sort_type_id = $stmt->fetch();

      // Insert the last sort's statistics into the database
      $stmt = $conn->prepare("INSERT INTO Stat (`FK_sort_type_id`, `stat_time`, `stat_cost`, `stat_total_nb`)
                              VALUES ($sort_type_id[0], :stat_time, :stat_cost, :stat_total_nb)"
                            );
      $stmt->bindValue(":stat_time", strval($sort->getSortTime()), PDO::PARAM_STR);
      $stmt->bindValue(":stat_cost", $sort->getSortCost(), PDO::PARAM_INT);
      $stmt->bindValue(":stat_total_nb", $sort->getSortTotalNb(), PDO::PARAM_STR);
      $stmt->execute();
    }
    catch(PDOException $e)
    {
      echo "Error: ". $e->getMessage();
      $conn = NULL;
      return (NULL);
    }
  $conn = NULL;
  return (true);
  }
}
?>
