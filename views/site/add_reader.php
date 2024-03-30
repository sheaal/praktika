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
        button{
            background-color: #7e60a8;
        }
        .read-btn{
            display: flex;
            align-items: flex-end;
            color: white;
            background-color: #7e60a8;
            border-radius: 5px;
            margin-left: 7px;
            margin-top: 20px;
        }
        .read-cont{
            margin-left: 20px;
            justify-content: center;
            display: flex;
        }
        .read-block{
            margin-top: 40px;
            background-color: #472d6d;
            width: 800px;
            height: 400px;
            padding-left: 10px;
            padding-top: 10px;
            color: white;
            border-radius: 10px;
        }
    </style>

</head>
<body>
<h1>Добавление читателя</h1>
<form class="read-cont" method="POST">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <div class="read-block">
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

        <button class="read-btn" type="submit">Добавить</button>

        <?php if ($message): ?>
            <h3><?= htmlspecialchars($message) ?></h3>
        <?php endif; ?>
    </div>
</form>
</body>
</html>