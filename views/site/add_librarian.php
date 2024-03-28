<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление библиотекаря</title>
</head>
<body>
<header>

</header>

<main>
    <h1>Добавление библиотекаря</h1>
    <form action="<?= app()->route->getUrl('/add_librarian') ?>" method="post">
        <label for="last_name">Фамилия:</label>
        <input type="text" id="last_name" name="last_name"><br><br>

        <label for="first_name">Имя:</label>
        <input type="text" id="first_name" name="first_name"><br><br>

        <label for="middle_name">Отчество:</label>
        <input type="text" id="middle_name" name="middle_name"><br><br>

        <label for="gender">Пол:</label>
        <select id="gender" name="gender">
            <option value="male">Мужской</option>
            <option value="female">Женский</option>
        </select><br><br>

        <label for="birth_date">Дата рождения:</label>
        <input type="date" id="birth_date" name="birth_date"><br><br>

        <label for="phone_number">Номер телефона:</label>
        <input type="tel" id="phone_number" name="phone_number"><br><br>

        <button type="submit">Добавить</button>
    </form>
</main>
</body>
</html>
