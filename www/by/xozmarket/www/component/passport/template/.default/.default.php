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
    <div>
        <script type="text/javascript">
            require.paths.passport = "/component/passport/template/<?= $this->template ?>/js/passport";
        </script>

        <link class="passport">

        <div>
            <form method="post" action="component/passport/template/pipe.php?action=login&uid=<?= session_id() ?>">
                <input type="text" name="email">
                </br>
                <input type="password" name="password">
                <div>
                    <input type="submit" name="Войти">
                </div>
            </form>
            <div>
                <a href="component/passport/template/pipe.php?action=register&uid=<?= session_id() ?>">Регистрация</a>
            </div>
            <div>
                <a href="component/form_adding/template/pipe.php?action=formAdd">Добавить продукт</a>
            </div>
        </div>
    </div>
<?php endif; ?>
