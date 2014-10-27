<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Content.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Session.php");

class ContentJPG extends Content {
    function __construct() {
    }

    function output() {
        session_id(Session::getID());
        session_start();

        if(ob_get_level() == 0) {
            ob_start();
        }

        $file = $_SERVER["DOCUMENT_ROOT"] . $GLOBALS["router"]->root . $GLOBALS["router"]->path;

        if(file_exists($file)) {
            header('Content-type: image/jpeg; charset=UTF-8');
            readfile($file);
        }
        else {
            header("HTTP/1.1 404 Not Found");
            echo "Not found";
        }

        ob_flush();
        flush();
    }
}