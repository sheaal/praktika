<h2>
    <?php if (app()->auth::check()): ?>Регистрация Библиотекаря
    <?php else: ?>Регистрация Администратора
    <?php endif; ?>
</h2>
<h3><?= $message ?? ''; ?></h3>
<style>
    .sign-btn{
        width: 150px;
        margin-top: 10px;
        background-color: #7e60a8;
        border-radius: 5px;
        color: white;
    }
    label{
        padding: 5px 0 0 0;
    }
    .form-sign{
        flex-direction: column;
        display: flex;
    }
</style>
<form class="form-sign" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label>Имя <input type="text" name="name"></label>
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <button class="sign-btn">Зарегистрироваться</button>
</form>