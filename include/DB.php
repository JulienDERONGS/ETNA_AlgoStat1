<?php
/**
 * Database connexion class
 */
// TODO: destructor!
class             DB extends SingletonFactory
{
  private static  $isConnected = false;
  private static  $conn = NULL;

  function        connect()
  {
    $config = Config::getInstance();
    if (!static::$isConnected)
    {
      try
      {
        $config = Config::getInstance();
        $conn = new PDO("mysql:host=". $config->getIP() .";port=8889;dbname=". $config->getDBname(), $config->getUsername(), $config->getPassword());
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        static::$conn = $conn;
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

  function        add_data()
  {
    try
    {
      // Prepare SQL and bind parameters
      $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
      VALUES (:firstname, :lastname, :email)");
      $stmt->bindParam(':firstname', $firstname);
      $stmt->bindParam(':lastname', $lastname);
      $stmt->bindParam(':email', $email);

      // insert a row
      $firstname = "John";
      $lastname = "Doe";
      $email = "john@example.com";
      $stmt->execute();

      // insert another row
      $firstname = "Mary";
      $lastname = "Moe";
      $email = "mary@example.com";
      $stmt->execute();

      // insert another row
      $firstname = "Julie";
      $lastname = "Dooley";
      $email = "julie@example.com";
      $stmt->execute();

      echo "New records created successfully";
    }
    catch(PDOException $e)
    {
      echo "Error: ". $e->getMessage();
    }
  $conn = null;
  }
}
?>
