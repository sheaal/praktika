<h2>Авторизация</h2>
<h3><?= $message ?? ''; ?></h3>
<style>
    .login-btn{
        width: 150px;
        margin-top: 10px;
        background-color: #7e60a8;
        border-radius: 5px;
        color: white;
    }
    .form-login{
        flex-direction: column;
        display: flex;
    }
    label{
        padding: 5px 0 0 0;
    }
</style>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <form class="form-login" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label>Логин <input type="text" name="login"></label>
        <label>Пароль <input type="password" name="password"></label>
        <button class="login-btn">Войти</button>
    </form>
<?php endif;
