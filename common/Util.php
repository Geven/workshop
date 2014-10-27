<?php

function getFile($path) {
    $file = $_SERVER["DOCUMENT_ROOT"] . $GLOBALS["router"]->root . $GLOBALS["router"]->path;

    if(file_exists($file)) {
        header('Content-type: text/html; charset=UTF-8');
        require($file);
    }
    else {
        header("HTTP/1.1 404 Not Found");
        echo "Not found";
    }
}