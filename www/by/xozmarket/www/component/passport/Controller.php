<?php
namespace local\passport;

class Controller {
    public $user;
    public $json;

    function __construct() {
        $this->user = new \User();
        $this->json = new \stdClass();
    }

    function process() {
        switch($value = \RequestCheck::mine("action")) {
            case "login":
                $this->login();
                break;

            case "register":
                $this->register();
                break;

            case "confirm":
                $this->confirm();
                break;

            case "captcha":
                $this->captcha();
                break;
        }

        $this->output();
    }

    function output() {
        print(json_encode($this->json));
    }

    function captcha() {
        $captcha = new \Captcha();

        $key = null;

        if($this->validate("key")) {
            $key = $_REQUEST["key"];
        }
        else {
            $this->json->status = false;
            $this->json->info = "Invalid key format";

            return;
        }

        if($key == $captcha->secret) {
            $captcha->reset();

            $this->json->status = true;
            $this->json->info = "Captcha success";
        }
        else {
            $captcha->generate();

            $this->json->status = false;
            $this->json->info = "Invalid captcha";
        }
    }

    function login() {
        $captcha = new \Captcha();

        $this->json->count = $captcha->count;

        if($captcha->count == 3) {
            $captcha->generate();

            $this->json->status = false;
            $this->json->info = "Captcha validation";

            return;
        }

        $email = null;
        $password = null;

        if($this->validate("email")) {
            $email = $_REQUEST["email"];
        }
        else {
            $this->json->status = false;
            $this->json->info = "Invalid email format.";

            return;
        }

        if($this->validate("password")) {
            $password = $_REQUEST["password"];
        }
        else {
            $this->json->status = false;
            $this->json->info = "Invalid password format.";

            return;
        }

        $db = new \DBManager(HOST, USER, PASSWORD, DB);

        if($db->connect()) {
            goto a;

            a:
            $value = "SELECT * FROM user WHERE email='{$email}' AND password='{$password}' AND confirmation=1 LIMIT 1";
            if($db->query($value)) {
                $type = (gettype($db->result) == "boolean");

                if($type) {
                    //ничего не делаем :)
                }
                else {
                    $count = $db->result->num_rows;
                    if($count > 0) {
                        $row = $db->result->fetch_assoc();

                        $_SESSION["type"] = $row["type"];
                        $_SESSION["info"] = $row;

                        $db->result->free();

                        //header("Location: http://{$GLOBALS["host"]->name}.{$GLOBALS["host"]->host}.{$GLOBALS["host"]->zone}");

                        $captcha->reset();

                        $this->json->status = true;
                        $this->json->info = "Login success.";
                    }
                    else {
                        $captcha->plus();

                        $this->json->status = false;
                        $this->json->info = "User not found.";
                    }
                }
            }
            else {
                $this->json->status = false;
                $this->json->info = "Failed to make a query.";
            }

            $db->close();
        }
        else {
            $this->json->status = false;
            $this->json->info = "Failed to connect to MySQL: " . $db->mysqli->connect_error . ".";
        }
    }

    function register() {
        header("Location: http://{$GLOBALS["host"]->name}.{$GLOBALS["host"]->host}.{$GLOBALS["host"]->zone}/registration.php");
    }

    function confirm() {
        $secret = null;

        if($this->validate("secret")) {
            $secret = $_REQUEST["secret"];
        }
        else {
            $this->json->status = false;
            $this->json->info = "Invalid secret format.";

            return;
        }

        $db = new \DBManager(HOST, USER, PASSWORD, DB);

        if($db->connect()) {
            goto a;

            a:
            $value = "SELECT secret FROM user WHERE secret='{$secret}'";
            if($db->query($value)) {
                $type = (gettype($db->result) == "boolean");

                if($type) {
                    //ничего не делаем :)
                }
                else {
                    $count = $db->result->num_rows;
                    if($count > 0) {
                        goto b;
                    }
                    else {
                        $_SESSION["confirmation"]++;

                        $this->json->status = false;
                        $this->json->info = "No user with such secret.";
                    }
                }
            }
            else {
                $this->json->status = false;
                $this->json->info = "Failed to make a query.";
            }

            b:
            $value = "UPDATE user SET confirmation=1 WHERE secret='{$secret}' LIMIT 1";
            if($db->query($value)) {
                $type = (gettype($db->result) == "boolean");

                if($type) {
                    goto c;
                }
                else {
                    //ничего не делаем :)
                }
            }
            else {
                $this->json->status = false;
                $this->json->info = "Failed to make a query.";
            }

            c:
            $value = "SELECT * FROM user WHERE secret='{$secret}' LIMIT 1";
            if($db->query($value)) {
                $type = (gettype($db->result) == "boolean");

                if($type) {
                    //ничего не делаем :)
                }
                else {
                    $count = $db->result->num_rows;
                    if($count > 0) {
                        $row = $db->result->fetch_assoc();

                        $_SESSION["authorization"] = true;
                        $_SESSION["login"] = 0;
                        $_SESSION["registration"] = 0;
                        $_SESSION["confirmation"] = 0;
                        $_SESSION["info"] = $row;

                        $db->result->free();

                        header("Location: http://{$GLOBALS["host"]->name}.{$GLOBALS["host"]->host}.{$GLOBALS["host"]->zone}");

                        $this->json->status = true;
                        $this->json->info = "Confirmation success.";
                    }
                }
            }
            else {
                $this->json->status = false;
                $this->json->info = "Failed to make a query.";
            }

            $db->close();
        }
        else {
            $this->json->status = false;
            $this->json->info = "Failed to connect to MySQL: " . $db->mysqli->connect_error . ".";
        }
    }

    function validate($field) {
        $result = false;

        if($field == "email") {
            if($value = \RequestCheck::mine("email")) {
                //сделать проверку
                $result = true;
            }
        }
        else
        if($field == "password") {
            if($value = \RequestCheck::mine("password")) {
                //сделать проверку
                $result = true;
            }
        }
        else
        if($field == "secret") {
            if($value = \RequestCheck::mine("secret")) {
                //сделать проверку
                $result = true;
            }
        }
        else
        if($field == "key") {
            if($value = \RequestCheck::mine("key")) {
                //сделать проверку
                $result = true;
            }
        }

        return $result;
    }
}


