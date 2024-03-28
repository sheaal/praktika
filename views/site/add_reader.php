<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление читателя</title>
    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<h1>Добавление читателя</h1>
<form action="<?= app()->route->getUrl('/add_reader') ?>" method="POST">
    <label for="card_number">Номер читательского билета:</label>
    <input type="text" id="card_number" name="card_number" required>

    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname" required>

    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required>

    <label for="patronymic">Отчество:</label>
    <input type="text" id="patronymic" name="patronymic">

    <label for="gender">Пол:</label>
    <select id="gender" name="gender">
        <option value="male">Мужской</option>
        <option value="female">Женский</option>
    </select>

    <label for="address">Адрес:</label>
    <input type="text" id="address" name="address" required>

    <label for="phone">Номер телефона:</label>
    <input type="tel" id="phone" name="phone">

    <input type="submit" value="Добавить">
</form>
</body>
</html>