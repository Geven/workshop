<?php
class CookieCheck {
    static function mine($value) {
        $data = null;

        if(isset($_COOKIE[$value])) {
            $data = $_COOKIE[$value];
        }
        else {
            $data = null;
        }

        return $data;
    }
}