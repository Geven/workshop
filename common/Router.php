<?php
class Router {
    public $root;
    public $path;
    public $query;

    function route($host, $request) {
        $this->root = "/www/$host->zone/$host->host/$host->name";
        $this->path = $request->path;
        $this->query = $request->query;
    }
}