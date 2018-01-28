<?php
/**
 * Database connexion class
 */
class             DB
{
  private         $ip;
  private         $dbname;
  private         $username;
  private         $password;

  function        __construct()
  {
    require_once "include/Autoloader.php";
    $autoloader = new Autoloader();
    $config = Config::getInstance();

    $ip = $config->getIP();
    $dbname = $config->getDBname();
    $username = $config->getUsername();
    $password = $config->getPassword();
  }

  function        connect()
  {
    try
    {
      $conn = new PDO("mysql:host=". $this->ip .";dbname=". $this->dbname .", ". $this->username .", ". $this->password);
      // Set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
      echo "Error: ". $e->getMessage();
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
