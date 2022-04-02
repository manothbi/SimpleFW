<?php
namespace Core\Database;

use \PDO;

class Database {

    private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_port;
    private $pdo;

    private static $_instance = null;

    public function __construct($db_name, $db_host, $db_user, $db_pass, $db_port){

      $this->db_name = $db_name;
      $this->db_user = $db_user;
      $this->db_pass = $db_pass;
      $this->db_host = $db_host;
      $this->db_port = $db_port;

    }

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    private function getPDO(){

      if($this->pdo === null){
        $pdo = new PDO("mysql:dbname=$this->db_name;host=$this->db_host;port=$this->db_port", 
          $this->db_user, 
          $this->db_pass
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
      }
      return $this->pdo;

    }

    public function query($statement, $class_name = null, $one = false){

      $req = $this->getPDO()->query($statement);

      if ($class_name === null) {
        $req->setFetchMode(PDO::FETCH_OBJ);
      }else{
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
      }
      
      
      if ($one) {
        $data = $req->fetch();
      } else {
        $data = $req->fetchAll();
      }

      return $data;

    }

    public function prepare($statement, $attributes = null, $class_name = null, $one = false){

      $req = $this->getPDO()->prepare($statement);
      $req->execute($attributes);
      
      if ($class_name === null) {
        $req->setFetchMode(PDO::FETCH_OBJ);
      }else{
        $req->setFetchMode(PDO::FETCH_OBJ);
      }
      
      if ($one) {
        $data = $req->fetch();
      } else {
        $data = $req->fetchAll();
      }

      return $data;


    }
}
