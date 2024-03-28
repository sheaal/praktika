<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Фамилия <input type="text" name="surname"></label>
    <label>Имя <input type="text" name="name"></label>
    <label>Отчество <input type="text" name="patronymic"></label>
    <label>Адрес <input type="text" name="read_address"></label>
    <label>Телефон <input type="tel" name="phone"></label>
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <button>Зарегистрироваться</button>
</form>
