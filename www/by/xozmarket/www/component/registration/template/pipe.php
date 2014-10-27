<?php
namespace local\registration;

require(dirname(dirname(__FILE__)) . "/Controller.php");

$controller = new Controller();
$controller->process();