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
            background-color: #846693;

            height: 50px;
        }
        header{
            width: 100%;
        }
        a{
            margin-left: 20px;
            color: white;
            text-decoration: none;
        }
        a:hover{
            text-shadow: white 1px 0 10px;
        }

        .block-book1{
            /*width: 800px;*/
            margin: auto;
            padding: 40px;
            justify-content: center;
            display: flex;

        }
        .book{
            background-color: #472d6d;
            color: aliceblue;
            width: 300px;
            height: 400px;
            margin-left: 10px;
            border-radius: 10px;

        }
        h1{
            display: flex;
            justify-content: center;
        }
        .hel-btn{
            display: flex;
            align-items: flex-end;
            color: white;
            background-color: #7e60a8;
            border-radius: 5px;
            margin-left: 7px;
        }
        section{


        }
        .book-text{


        }
        button:hover{
            box-shadow: black 1px 0 10px;
        }
    </style>
</head>
<body>
<header>

    <nav>
        <a href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
        <a href="<?= app()->route->getUrl('/search') ?>">Поиск</a>
        <?php if (!app()->auth::check()): ?>
<!--            <a href="--><?php //= app()->route->getUrl('/signup') ?><!--">Регистрация</a>-->
            <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
        <?php endif; ?>
        <?php if (app()->auth::check()): ?>
            <?php if (app()->auth::user()->id_role == 1): // 1 = Администратор?>
                <a href="<?= app()->route->getUrl('/signup') ?>">Добавление библиотекарей</a>
                <a href="<?= app()->route->getUrl('/selection') ?>">Выборка</a>
            <?php elseif (app()->auth::user()->id_role == 2): // 2 = Библиотека?>
                <a href="<?= app()->route->getUrl('/add_book') ?>">Добавление книг</a>
                <a href="<?= app()->route->getUrl('/add_reader') ?>">Добавление читателей</a>
                <a href="<?= app()->route->getUrl('/book_distribution') ?>">Выдача книг</a>
            <?php endif; ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
        <?php endif; ?>

    </nav>
</header>

<main>
    <?= $content ?? '' ?>
</main>
</body>
</html>


