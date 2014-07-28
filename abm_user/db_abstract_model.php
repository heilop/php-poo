<?php
  abstract class DBAbstractModel {
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = 'toor';
    protected $db_name = 'abm_user';
    protected $query;
    protected $rows = array();
    private $conn;

    // Metodos abstractos para clases que heredan.
    abstract protected function get();
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();

    // Conect to DB
    private function open_connection() {
      $this->conn = new mysqli(
        self::$db_host,
        self::$db_user,
        self::$db_pass,
        $this->db_name
      );
    }

    // Desconect DB.
    private function close_connection() {
      $this->conn->close();
    }

    // Excecute query
    protected function excecute_simple_query() {
      $this->open_connection();
      $this->conn->query($this->query);
      $this->close_connection();
    }
  }
?>
