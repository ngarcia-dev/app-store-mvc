<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

class Database
{
  private $host;
  private $db_name;
  private $username;
  private $password;
  private $connection;

  public function __construct()
  {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $this->host = $_ENV['DB_HOST'];
    $this->db_name = $_ENV['DB_NAME'];
    $this->username = $_ENV['DB_USERNAME'];
    $this->password = $_ENV['DB_PASSWORD'];
  }

  public function connect()
  {
    $this->connection = null;

    try {
      $this->connection = new PDO("pgsql:host={$this->host};dbname={$this->db_name};", $this->username, $this->password);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception) {
      echo "Error al conectar a la base de datos: " . $exception->getMessage();
    }

    return $this->connection;
  }
}
