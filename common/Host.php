<?php
class Host {
    public $zone;
    public $host;
    public $name;

    function parse() {
        $pieces = explode (".", $_SERVER["HTTP_HOST"]);

        $this->zone = array_pop($pieces);
        $this->host = array_pop($pieces);
        $this->name = array_pop($pieces);

        if($this->name == null) {
            $this->name = "www";
        }
    }
}