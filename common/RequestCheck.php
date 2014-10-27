<?php
class RequestCheck {
    static function mine($value) {
        $data = null;

        if(isset($_REQUEST[$value])) {
            $data = $_REQUEST[$value];
        }
        else {
            $data = null;
        }

        return $data;
    }
}