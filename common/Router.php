<?php
class Router {
    public $root;
    public $path;
    public $query;

    function route($host, $request) {
        $this->root = "/www/$host->zone/$host->host/$host->name";
        $this->path = $request->path;
        $this->query = $request->query;

        $data = file_get_contents($_SERVER["DOCUMENT_ROOT"] . $this->root . "/map.json");

        if($data) {

        }
        else {
            exit("ERROR: can't find map.json.");
        }
    }
}