<h2>
    <?php if (app()->auth::check()): ?>Регистрация Библиотекаря
    <?php else: ?>Регистрация Администратора
    <?php endif; ?>
</h2>
<h3><?= $message ?? ''; ?></h3>
<style>
    .sign-btn{
        margin-top: 10px;
    }
</style>
<form method="post">
    <label>Имя <input type="text" name="name"></label>
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <button class="sign-btn">Зарегистрироваться</button>
</form>