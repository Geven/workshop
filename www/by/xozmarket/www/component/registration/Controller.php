<?php
namespace local\registration;

class Controller {
    public $user;
    public $json;

    function __construct() {
        $this->user = new \User();
        $this->json = new \stdClass();
    }

    function process() {
        switch($value = \RequestCheck::mine("action")) {
            case "register":
                $this->register();
                break;

            case "logout":
                $this->logout();
                break;
        }

        $this->output();
    }

    function output() {
        print(json_encode($this->json));
    }

    function register() {
        $captcha = new \Captcha();

        $this->json->count = $captcha->count;

        if($captcha->count == 3) {
            $captcha->generate();

            $this->json->status = false;
            $this->json->info = "Captcha validation";

            return;
        }

        $name = null;
        $email = null;
        $password = null;
        $passwordRepeat = null;

        if($this->validate("name")) {
            $name = $_REQUEST["name"];
        }
        else {
            $this->json->status = false;
            $this->json->info = "Invalid name format.";

            return;
        }

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

        if($this->validate("passwordRepeat")) {
            $password = $_REQUEST["passwordRepeat"];
        }
        else {
            $this->json->status = false;
            $this->json->info = "Invalid passwordRepeat format.";

            return;
        }

        if($password != $passwordRepeat) {
            $this->json->status = false;
            $this->json->info = "Different passwords.";

            return;
        }

        $db = new \DBManager(HOST, USER, PASSWORD, DB);

        if($db->connect()) {
            goto a;

            a:
            $value = "SELECT * FROM user WHERE email='{$email}' LIMIT 1";
            if($db->query($value)) {
                $type = (gettype($db->result) == "boolean");

                if($type) {
                    //ничего не делаем :)
                }
                else {
                    $count = $db->result->num_rows;
                    if($count > 0) {
                        $captcha->plus();

                        $this->json->status = false;
                        $this->json->info = "User already exists.";
                    }
                    else {
                        $secret = hash("md5", mt_rand());
                        $date = new DateTime(null, new DateTimeZone('UTC'));
                        $since = $date->format("Y-m-d H:i:s");

                        $value = "INSERT INTO `xozmarket`.`user` (`type`, `name`, `email`, `password`, `secret`, `confirmation`, `since`) VALUES(NULL, '{$type}', '{$name}', '{$email}', '{$password}', '{$secret}', 0, '{$since}')";
                        if($db->query($value)) {

                        }
                        else {
                            $this->json->status = false;
                            $this->json->info = "Failed to make a query.";
                        }

                        $to      = 'twegostar@localhost';
                        $subject = 'the subject';
                        $message = '<!DOCTYPE html><html><head><meta charset="utf-8"></head><body><a href="http://www.xozmarket.by/component/passport/controller.php?action=confirm&secret=' . $secret . '">Подвердить</a></body></html>';
                        $headers = 'From: webmaster@example.com' . "\r\n" .
                            'Reply-To: webmaster@example.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                        if(mail($to, $subject, $message, $headers)) {
                            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/email/index.php";


                            $fp = fopen($path, "w+");
                            fwrite($fp, $message);
                            fclose($fp);
                        }
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

    function logout() {
        session_destroy();

        header("Location: http://{$GLOBALS["host"]->name}.{$GLOBALS["host"]->host}.{$GLOBALS["host"]->zone}");

        $this->json->status = true;
        $this->json->info = "Logout success";
    }

    function validate($field) {
        $result = false;

        if($field == "name") {
            if($value = \RequestCheck::mine("name")) {
                //сделать проверку
                $result = true;
            }
        }
        else
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
        if($field == "passwordRepeat") {
            if($value = \RequestCheck::mine("passwordRepeat")) {
                //сделать проверку
                $result = true;
            }
        }

        return $result;
    }
}









function match(&$mysqli, $email) {
    $result = $mysqli->query("SELECT * FROM user WHERE email='{$email}'");

    if($result->num_rows > 0) {
        return true;
    }
    else {
        return false;
    }
}

echo json_encode($GLOBALS["json"]);
