<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление книги</title>
</head>
<body>
<form action="<?= app()->route->getUrl('/add_book') ?>" method="post">

    <label for="author">Автор:</label>
    <input type="text" id="author" name="author"><br><br>

    <label for="title">Название:</label>
    <input type="text" id="title" name="title"><br><br>

    <label for="new_edition">Является ли новым изданием:</label>
    <select id="new_edition" name="new_edition">
        <option value="1">Да</option>
        <option value="0">Нет</option>
    </select><br><br>

    <label for="annotation">Краткая аннотация:</label>
    <textarea id="annotation" name="annotation"></textarea><br><br>

    <button type="submit">Добавить</button>
</form>
</body>
</html>