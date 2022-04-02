<?php
echo '<pre>';

if($autoload = file_exists(__DIR__ . "./../vendor/autoload.php")){
    require __DIR__ . "./../vendor/autoload.php";
  }else{
    echo "File: " . $autoload . " not found";
  }
  

  use Symfony\Component\Routing\RequestContext;
  use Symfony\Component\Routing\Router;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\RouteCollection;
  use Symfony\Component\Routing\Generator\UrlGenerator;
  use Symfony\Component\Config\FileLocator;
  use Symfony\Component\Routing\Loader\YamlFileLoader;
  use Symfony\Component\Routing\Exception\ResourceNotFoundException;

  echo '<pre>';

  $fileLocator = dirname(__DIR__) . '\\resource\\routes.php';

  $routes = new RouteCollection();
  $requestContext = new RequestContext();
  $requestContext->fromRequest(Request::createFromGlobals());

  // print_r($requestContext);

  $route = array(
      'new'=>
      [
          'path' => '/new',
          'name' => 'New',
          'controller' => 'NewController::index'
      ],
      'comment'=>
      [
          'path' => '/comment',
          'name' => 'Comment',
          'controller' => 'CommentController::index'
      ]
  );

  $getController = $route[str_replace('/', '', $requestContext->getPathInfo())];

 $explode = explode('::', $getController['controller']);
 $controller = $explode[0];

require dirname(__DIR__) . '\\src\\Controller\\' . $controller . '.php';
 

  $class = "\\App\\Controller\\$controller";

  call_user_func([$class, $explode[1]]);

  die();
  
  $router = new Router(
    $fileLocator, 
    'routes.php',
    array('cache_dir' => __DIR__.'/cache'),
    $requestContext
  );

  $parameters = $router->match($requestContext->getPathInfo());
  print_r($parameters);
