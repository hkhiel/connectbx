<?php
class DB
{
  private static $_instance = null;
  private $_connection;

  /*LOCAL*/
  private $_database = 'connectbx';
  private $_username = 'connectbzcadmin';
  private $_password = 'Connect152';
  private $_host='localhost';

  /*SERVEUR*/
//  private $_database = 'connectbzcadmin';
//  private $_username = 'connectbzcadmin';
//  private $_password = 'Connect152';
//  private $_host='connectbzcadmin.mysql.db';

  private $_SERVER;
  // TODO : export Google key
  const GOOGLE_KEY = 'AIzaSyB-6-zOi3t8wFJ27NJFpVdSzI-hrA7rM50';

  private function __construct()
  {
    //Nothing - Singleton
  }
  public static function get_instance()
  {
    if (is_null(self::$_instance))
      self::$_instance = new DB();
    return self::$_instance;
  }
  public function get_connection()
  {
    return $this->_connection;
  }
  public function open_connection()
  {
    try
    {
      $this->_connection = new PDO(
          "mysql:host={$this->_host};dbname={$this->_database}",
          $this->_username,
          $this->_password,
          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
      );
    }
    catch (PDOException $e)
    {
      die('PDO OPENING CONNECTION ERROR: ' . $e->getMessage() . "host = " .$this->_host .'<br/>');
    }
  }
  public function close_connection()
  {
    try
    {
      $this->_connection = null;
    }
    catch (PDOException $e)
    {
      die('PDO CLOSING CONNECTION ERROR: ' . $e->getMessage() . '<br/>');
    }
  }
  public function connect_user($username, $password)
  {
    try
    {
      $query = 'SELECT * FROM users WHERE username = :username AND password = :password';
      $result = $this->_connection->prepare($query);
      $result->bindParam(':username', $username);
      $result->bindParam(':password', $password);
      $result->execute();
      $result = $result->fetchAll(PDO::FETCH_ASSOC);
      if(count($result) > 0)
        return $result;
      return null;
    }
    catch (PDOException $e)
    {
      return null;
    }
  }
  public function select_all_associations()
  {
    $query = 'SELECT assoc.*, adr.*, t.name AS theme, d.name AS district FROM associations AS assoc 
              INNER JOIN addresses AS adr ON assoc.address_id = adr.address_id 
              INNER JOIN themes AS t ON assoc.theme_id = t.theme_id 
              INNER JOIN districts AS d ON adr.post_code = d.post_code
              WHERE assoc.is_disabled = false;';
    $result = $this->_connection->query($query);
    $result->execute();
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function select_all_events()
  {
    $query = 'SELECT e.*,
              a.street, a.number, a.post_code, d.name AS district FROM events AS e
              INNER JOIN addresses AS a ON e.address_id = a.address_id
              INNER JOIN districts AS d ON a.post_code = d.post_code
              WHERE e.is_disabled = false
              ORDER BY start_date ASC;';
    $result = $this->_connection->query($query);
    $result->execute();
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function select_event($id)
  {
    $query = 'SELECT e.*, a.street, a.number, a.post_code, d.name AS district FROM events AS e
              INNER JOIN addresses AS a ON e.address_id = a.address_id
              INNER JOIN districts AS d ON a.post_code = d.post_code
              WHERE e.event_id = :id AND e.is_disabled = false;';
    $result = $this->_connection->prepare($query);
    $result->bindParam(':id', $id);
    $result->execute();
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) == 1)
      return $result[0];
    return null;
  }
  public function select_association($id)
  {
    $query = 'SELECT assoc.*, adr.street, adr.number, adr.post_code, t.name AS theme, d.name AS district FROM associations AS assoc 
              INNER JOIN addresses AS adr ON assoc.address_id = adr.address_id
              INNER JOIN themes AS t ON assoc.theme_id = t.theme_id
              INNER JOIN districts AS d ON adr.post_code = d.post_code
              WHERE assoc.association_id = :id AND assoc.is_disabled = false;';
    $result = $this->_connection->prepare($query);
    $result->bindParam(':id', $id);
    $result->execute();
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) == 1)
      return $result[0];
    return null;
  }
  public function select_all_districts()
  {
    $query = 'SELECT * FROM districts';
    $result = $this->_connection->query($query);
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function select_all_themes()
  {
    $query = 'SELECT * FROM themes';
    $result = $this->_connection->query($query);
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function add_message($firstname, $lastname, $email,$subject,$message,$created_on)
  {
    try
    {
      $query =
        'INSERT INTO messages (firstname,lastname,email,subject,message,created_on) 
        VALUES (:firstname,:lastname,:email,:subject,:message,:created_on)';
      $result = $this->_connection->prepare($query);
      $result->bindParam(':firstname', $firstname);
      $result->bindParam(':lastname', $lastname);
      $result->bindParam(':email', $email);
      $result->bindParam(':subject', $subject);
      $result->bindParam(':message', $message);
      $result->bindParam(':created_on', $created_on);
      $result->execute();
      return true;
    }
    catch (PDOException $e)
    {
      return $e;
    }
  }


}
?>