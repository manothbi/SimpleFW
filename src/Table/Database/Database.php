<?php
namespace App\Database;

use \PDO;

class Database {

    private static $_instance = null;

    public function __construct($db_name = 'phptest', $db_host = 'localhost', $db_user = 'root', $db_pass = 'root1981', $db_port = 3308 ){

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
        $pdo = new PDO("mysql:dbname=$this->db_name;host=localhost;port=3308", 'root', 'root1981');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        return $this->pdo;
      }
      return $this->pdo;

    }

    public function query($statement, $class_name, $one = false){

      $req = $this->getPDO()->query($statement);
      $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
      
      if ($one) {
        $data = $req->fetch();
      } else {
        $data = $req->fetchAll();
      }

      return $data;

    }

    public function prepare($statement, $attributes, $class_name, $one = false){

      $req = $this->getPDO()->prepare($statement);
      $req->execute($attributes);
      $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
      
      if ($one) {
        $data = $req->fetch();
      } else {
        $data = $req->fetchAll();
      }

      return $data;


    }

    public function select()
    {

      $stmt = $this->prepare();

    }

    public function find()
    {
      $stmt = $this->prepare('SELECT * FROM WHERE id = ?', $id);

    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function remove()
    {

    }

}
