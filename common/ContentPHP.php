<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Component.php");

class ContentPHP extends Content {
    function __construct() {
    }

    function output() {
        session_start();

        if(ob_get_level() == 0) {
            ob_start();
        }

        $file = $_SERVER["DOCUMENT_ROOT"] . $GLOBALS["router"]->root . $GLOBALS["router"]->path;

        if(file_exists($file)) {
            header('content-type: text/html');
            require($file);
        }
        else {
            header("HTTP/1.1 404 Not Found");
            echo "Not found";
        }

        ob_flush();
        flush();
    }
}
