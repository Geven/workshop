<?php
//error_reporting(E_ERROR | E_PARSE);

require($_SERVER["DOCUMENT_ROOT"] . "/common/Host.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Request.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Router.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Resource.php");

$host = new Host();
$host->parse();

$request = new Request();
$request->parse();

$router = new Router();
$router->route($host, $request);

$resource = new Resource();
$resource->send($router);






