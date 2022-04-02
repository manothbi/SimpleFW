<?php

echo "<pre>";
if($autoload = file_exists(__DIR__ . "./../vendor/autoload.php")){
  require __DIR__ . "./../vendor/autoload.php";
}else{
  echo "File: " . $autoload . " not found";
}

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$requestContext = new RequestContext();
$requestContext->fromRequest(Request::createFromGlobals());

Core\Bootstrap::getInstance($requestContext);


