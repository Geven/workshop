<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Factory.php");

class Resource {
    function send($router) {
        $content = Factory::getClass(pathinfo($router->path, PATHINFO_EXTENSION));
        $content->output();
    }
}