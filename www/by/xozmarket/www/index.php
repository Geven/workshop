<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>
        <?php
            echo $GLOBALS["host"]->name . "." . $GLOBALS["host"]->host . "." .$GLOBALS["host"]->zone;
        ?>
        </title>
    </head>
    <body>
    Hello world!
    <?php
        $component = new Component('local', '_a', '.default', true, 30, array(), $this);
    ?>
    </body>
</html>



