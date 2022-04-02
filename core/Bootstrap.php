<?php 

namespace Core;

use App\Controller\CommentController;
use App\Controller\NewController;

class Bootstrap
{

    protected $path;
    protected $controller;
    protected $method;
    protected $args = array();
    protected $reqContext;
    protected $route;

    private static $_instance = null; 


    public function __construct($requestContext)
    {
        $this->reqContext = $requestContext->getPathInfo();

        $this->route = require dirname(__DIR__) . '\\config\\routes.php';

        $this->getPath($requestContext);        
        $this->getController();

    }

    public static function getInstance($requestContext)
    {
        if (!self::$_instance) {
            self::$_instance = new self($requestContext);
        }

        return self::$_instance;
    }

    protected function getController()
    {
        
        $explode = explode('::', $this->route[$this->reqContext]['controller']);

        $this->controller = $explode[0];  

        $this->method = $explode[1];

        $build_url = "\\App\\Controller\\$this->controller";
        $class = new $build_url;
        
        
        try {

            call_user_func_array(array($class, $this->method), array($this->args));

        } catch (\Throwable $th) {
            print_r($th);
        }
    }

    protected function getPath($requestContext)
    {
        $explode =  explode('/', $this->reqContext);
       
        if(sizeof($explode) >= 2)
        {
            // call controller method with asossiated args
            $this->args = isset($explode[2]) ? $explode[2] : null;
            $this->reqContext = $this->getArgs(':id', $this->args);

            switch ($this->args) {
                case (int) $this->args:
                    $this->reqContext = $this->getArgs(':id', $this->args);
                    break;

                case (string) $this->args:
                    $this->reqContext = $this->getArgs(':name', $this->args);
                break;                
                
                default:
                    # code...
                    break;
            }

        }
        
        $this->path = $explode[1];        

    }

    protected function getArgs($replace, $arg)
    {
        return str_replace($arg, $replace, $this->reqContext);
    }


}