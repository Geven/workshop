<?php
class Factory {
    static function getClass($ext) {
        $name = null;

        switch ($ext) {
            case "php":
                $name = "ContentPHP";
                break;
        }

        return new $name();
    }
}