<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление книги</title>
</head>
<style>
    .form-book{
        margin-top: 40px;
        background-color: #472d6d;
        width: 800px;
        height: 300px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        color: white;
        border-radius: 10px;
    }
    .form-cont{
        margin-left: 20px;
    }
    button{
        background-color: #7e60a8;
        border-radius: 5px;
        color: white;
    }
</style>

<body>
<h3><?= $message ?? ''; ?></h3>
<form class="form-book" method="post" enctype="multipart/form-data">

    <h1>Добавление книги</h1>

    <div class="form-cont">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <label>
            <select name="id_author">
                <option value="">Автор</option>
                <?php foreach ($authors as $author) { ?>
                    <option value="<?php echo $author->id_author; ?>">
                        <?php echo $author->surname; ?>
                    </option>
                <?php } ?>
            </select>
        </label>

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
    </div>
</form>

</body>
</html>