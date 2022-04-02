<?php
namespace App;

use Core\Database\Database;
use Core\Config;

class App{


    private static $_instance;
    private  $db_instance;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            
            self::$_instance = new App();
        }

        return self::$_instance;
    }


    public function getTable($name){
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());

    }

    public function getDb(){

        $config = Config::getInstance(dirname(__DIR__) . '/config/config.php');

        if(is_null($this->db_instance)){
            $this->db_instance = new Database(
                $config->get('db_name'), 
                $config->get('db_host'), 
                $config->get('db_user'),
                $config->get('db_pass'),
                $config->get('db_port')
            );
        }
        return $this->db_instance;
    }

}