<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Branch.php");

class Tree{
    function __construct() {
        $path = $_SERVER["DOCUMENT_ROOT"] . $GLOBALS["router"]->root . $GLOBALS["router"]->path;
        $file = file_exists($path);

        if($file) {
            header('Content-type: text/html; charset=UTF-8');
            require($path);
        }
        else {
            header("HTTP/1.1 404 Not Found");
            echo "Not found";
        }
    }
}