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
   
  try
  {
      $fileLocator = new FileLocator(array(dirname(__DIR__) . '\\config\\'));

      $route = dirname(__DIR__). '\\config\\routes.php';
      $routes = new RouteCollection();
      $requestContext = new RequestContext();
      $requestContext->fromRequest(Request::createFromGlobals());
      
   
      $router = new Router(
          $fileLocator, 
          'routes.php',
          array('cache_dir' => __DIR__.'/cache'),
          $requestContext
        );

      /*
      $router = new Router(
          new YamlFileLoader($fileLocator),
          'routes.yaml',
          array('cache_dir' => __DIR__.'/cache'),
          $requestContext
      );
      */
      // Find the current route
      $parameters = $router->match($requestContext->getPathInfo());
   
      // How to generate a SEO URL
      $routes = $router->getRouteCollection();
      $generator = new UrlGenerator($routes, $requestContext);
   
      echo '<pre>';
      print_r($routes);
   
      //echo 'Generated URL: ' . $url;
      exit;
  }
  catch (ResourceNotFoundException $e)
  {
    echo $e->getMessage();
  }