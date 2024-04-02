<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Выборка</title>
</head>
<style>

    section{
        display: inline-block;
        background-color: #472d6d;
        width: 300px;
        height: 310px;
        margin-left: 10px;
        border-radius: 10px;
        color: white;
    }
    .sel-block{
        /*width: 800px;*/
        margin: auto;
        padding: 40px;
        justify-content: center;
        display: flex;

    }
    .p-block{
        margin-left: 15px;
        width: 240px;
        height: 200px;
        background-color: #2c2434;
        border-radius: 10px;

    }
    p{
        margin-top: 10px;
        margin-left: 10px;
        color: black;
    }
    a{
        margin-top: 10px;
        margin-left: 10px;
        color: white;
    }

    .check-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .check-item input[type="checkbox"] {
        margin-right: 10px;
    }

</style>
<body>
<h1>Выборка</h1>
<form class="form-distr" method="post">
    <div class="sel-block">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <div>
            <select name="id_read_ticket" id="id_read_ticket">
                <option value="">Выберите читателя</option>
                <?php foreach ($readers as $reader): ?>
                    <option value="<?= $reader->id_read_ticket; ?>">
                        <?= htmlspecialchars("{$reader->surname} {$reader->patronymic}"); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button id="select-btn">Выбрать</button>
        </div>
    </div>
</form>

<div class="selection-bl">
    <?php foreach ($readers as $reader): ?>
    <h2>Информация о читателе:</h2>
        <div class="distr">
            <p>Фамилия: <?= htmlspecialchars($reader->surname) ?></p>
            <p>Отчество: <?= htmlspecialchars($reader->patronymic) ?></p>
        </div>
    <?php foreach ($book_distribution as $distribution): ?>
        <?php if($distribution["id_read_ticket"]==$reader["id_read_ticket"]) : ?>

            <div class="distr">
                <?php foreach ($books as $book): ?>
                <?php if($distribution["id_book"]==$book["id_book"]) : ?>
                <p>Название книги: <?= htmlspecialchars($book->title) ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
                <p>Дата выдачи: <?= htmlspecialchars($distribution->date_issue) ?></p>
                <p>Дата возврата: <?= htmlspecialchars($distribution->return_date) ?></p>
                <p>Статус: <?= htmlspecialchars($distribution->status) ?></p>
            </div>
            <?php endif; ?>
    <?php endforeach; ?>


    <?php endforeach; ?>
</div>

<!--    <section>-->
<!--        <h1>Книги на руках</h1>-->
<!--        <div class="p-block" >-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <a href="#">Ещё</a>-->
<!--        </div>-->
<!--    </section>-->
<!--    <section>-->
<!--        <h1>История выдачи книг</h1>-->
<!--        <div class="p-block" >-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <a href="#">Ещё</a>-->
<!--        </div>-->
<!--    </section>-->
<!--    <section>-->
<!--        <h1>Популярные книги</h1>-->
<!--        <div class="p-block" >-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <div class="check-item">-->
<!--                <input type="checkbox">-->
<!--                <p>...</p>-->
<!--            </div>-->
<!--            <a href="#">Ещё</a>-->
<!--        </div>-->
<!--    </section>-->
</div>
</body>
</html>