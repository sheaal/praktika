<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>

    <style>
        nav{
            background-color: darkgray;
            height: 50px;
        }
        header{
            width: 1920px;
        }
        a{
            margin-left: 20px;
        }
        .block-book1{
            /*width: 800px;*/
            margin: auto;
            padding: 40px;
            justify-content: center;
            display: flex;
        }
        .book{
            background-color: black;
            display: inline-block;
            color: aliceblue;
            width: 300px;
            height: 400px;
            margin-left: 10px;

        }
        h1{
            display: flex;
            align-items: flex-end;
        }
        button{
            display: flex;
            align-items: flex-end;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
        <a href="<?= app()->route->getUrl('/search') ?>">Поиск</a>
        <a href="<?= app()->route->getUrl('/add_book') ?>">Добавление книг</a>
        <a href="<?= app()->route->getUrl('/add_reader') ?>">Добавление читателей</a>
        <a href="<?= app()->route->getUrl('/add_librarian') ?>">Добавление библиотекарей</a>
        <a href="<?= app()->route->getUrl('/selection') ?>">Выборка</a>
        <?php
        if (!app()->auth::check()):
            ?>
            <a href="<?= app()->route->getUrl('/search') ?>">Поиск</a>
            <a href="<?= app()->route->getUrl('/add_book') ?>">Добавить книгу</a>
            <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
            <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
        <?php
        else:
            ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
        <?php
        endif;

//        app()->route->get('/search', function () {
//            return (new Controller\Site())->search();
//        });
        ?>
    </nav>
</header>

<main>
    <?= $content ?? '' ?>
</main>
</body>
</html>


