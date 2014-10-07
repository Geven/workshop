<?php
class Request {
    public $path;
    public $query;

    public function parse() {
        $pieces = explode("?", urldecode($_SERVER["REQUEST_URI"]));

        $this->path = array_shift($pieces);
        $this->query = array_shift($pieces);
    }
}