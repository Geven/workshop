<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Factory.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Content.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/ContentPHP.php");

class Resource {
    function send($router) {
        $content = Factory::getClass(pathinfo($router->path, PATHINFO_EXTENSION));
        $content->output();
    }
}