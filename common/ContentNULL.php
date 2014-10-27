<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Content.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Session.php");

class ContentNULL extends Content {
    function __construct() {
    }

    function output() {
        session_id(Session::getID());
        session_start();

        if(ob_get_level() == 0) {
            ob_start();
        }

        $path = $_SERVER["DOCUMENT_ROOT"] . $GLOBALS["router"]->root . $GLOBALS["router"]->path;

        if(file_exists($path)) {
            header('Content-type: text/html; charset=UTF-8');
            require($path);
        }
        else {
            header("HTTP/1.1 404 Not Found");
            echo "Not found";
        }

        ob_flush();
        flush();
    }
}
