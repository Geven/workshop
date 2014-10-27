<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Host.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Request.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Router.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Resource.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/SessionCheck.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/RequestCheck.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/CookieCheck.php");

$host = new Host();
$host->parse();

$request = new Request();
$request->parse();

$router = new Router();
$router->route($host, $request);

$resource = new Resource();
$resource->send($router);



