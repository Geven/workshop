<?php
namespace local\form_adding;

//var_dump(dirname(dirname(__FILE__)) . "/Controller.php");
require(dirname(dirname(__FILE__)) . "/Controller.php");

$controller = new Controller();
$controller->process();


