<div>
    <script type="text/javascript">
        require.paths.account = "/component/account/template/<?= $this->template ?>/js/account";
    </script>

    <link class="account">

    <div>
        Добро пожаловать <?= $GLOBALS["user"]->info["name"] ?>!
        </br>
        Тип вашего аккаунта:  <?= $GLOBALS["user"]->info["type"] ?>!
        <div>
            <a href="component/account/template/pipe.php?action=logout&uid=<?= session_id() ?>">Выйти</a>
        </div>
    </div>
</div>