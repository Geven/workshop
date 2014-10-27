<?php
class SessionCheck {
    static function mine($value) {
        $data = null;

        if(isset($_SESSION[$value])) {
            $data = $_SESSION[$value];
        }
        else {
            $data = null;
        }

        return $data;
    }
}