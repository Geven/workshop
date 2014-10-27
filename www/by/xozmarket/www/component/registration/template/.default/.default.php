<?php if($this->m->data["CAPTCHA"]->count == 3): ?>
    <div>
        <script type="text/javascript">
            require.paths.captcha = "/component/passport/template/<?= $this->template ?>/js/captcha";
        </script>

        <link class="captcha">

        <div>
            <form method="post" action="component/passport/template/pipe.php?action=captcha&uid=<?= session_id() ?>">
                <input type="text" name="captcha" maxlength="10" size="32" />
                <br>
                <img src="/captcha/<?= date("d.m.y") ?>/<?= session_id() ?>.jpg"/>
                <div>
                    <input type="submit" name="Отправить">
                </div>
            </form>
        </div>
    </div>
<?php else: ?>
    <?php if($GLOBALS["user"]->type == "guest"): ?>
        <div>
            <script type="text/javascript">
                require.paths.registration = "/component/registration/template/<?= $this->template ?>/registration";
            </script>

            <link id="registration">

            <div>
                <form method="post" action="component/registration/template/pipe.php?action=register&uid=<?= session_id() ?>">
                    <input type="text" name="name">
                    </br>
                    <input type="text" name="email">
                    </br>
                    <input type="password" name="password">
                    </br>
                    <input type="password" name="passwordRepeat">
                    <div>
                        <input type="submit" name="Отправить">
                    </div>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div>
            Для того чтобы зарегистрировать нового пользователя, вам необходимо <a href="component/registration/template/pipe.php?action=logout&uid=<?= session_id() ?>">Выйти</a>.
        </div>
    <?php endif; ?>
<?php endif; ?>