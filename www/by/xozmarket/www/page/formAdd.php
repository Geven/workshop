<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>
        <?php
        $root = "http://" . $GLOBALS["host"]->name . "." . $GLOBALS["host"]->host . "." .$GLOBALS["host"]->zone;
        echo $root;
        ?>
    </title>

</head>
<body>
<script type="text/javascript">
    var zone = "<?= $GLOBALS["host"]->zone ?>";
    var host = "<?= $GLOBALS["host"]->host ?>";
    var name = "<?= $GLOBALS["host"]->name ?>";

    var root = name + "." + host + "." + zone;
    var uid = <?= session_id() ?>;

    var require = {
        packages: [],
        paths: {}
    }
</script>

<?php
$user = new User();
$GLOBALS["user"] = &$user;
$branch = new Branch("local", "form_adding", ".default", false, 0, array(), $this);
?>

<script data-main="<?=$root?>/js/app.js" src="<?=$root?>/require.js"></script>

</body>
</html>