<style>
    .book-distr{
        color: white;
        display: flex;
        gap: 20px;
        margin-top: 30px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .distr{
        width: 300px;
        height: 250px;
        background-color: #472d6d;
        border-radius: 10px;
        padding: 7px 0 0 10px;
    }
    button{
        background-color: #7e60a8;
        color: white;
        border-radius: 5px;
    }
</style>
<h1>Добавление читателя для выдачи книг</h1>
<h3><?= $message ?? ''; ?></h3>
<form class="form-distr" method="post">
<div class="book-distr">
        <div class="distr-div">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>
                <select name="id_book">
                    <option value="id_book">Название книги</option>
                    <?php foreach ($books as $book) { ?>
                        <option value="<?= $book->id_book; ?>">
                            <?= $book->title; ?>
                        </option>
                    <?php } ?>
                    </option>

                </select>
            </label>
            <label>
                <select name="id_read_ticket">
                    <option value="id_read_ticket">ФИО</option>
                    <?php foreach ($readers as $reader): ?>
                        <option value="<?= $reader->id_read_ticket; ?>">
                            <?= $reader->surname; ?>
                            <?= $reader->patronymic; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>
                <input type="date" name="date_issue" placeholder="Дата выдачи">
            </label>
            <label>
                <input type="date" name="return_date" placeholder="Дата возврата">
            </label>
            <select name="status">
                <option value="issue">Выдан</option>
                <option value="return">Возврат</option>
            </select>

            <button type="submit">Добавить</button>

<!--            --><?php
//            if (!empty($errors)) {
//                echo '<div class="errors">';
//                foreach ($errors as $field => $fieldErrors) {
//                    foreach ($fieldErrors as $error) {
//                        echo '<p class="error">' . $error . '</p>';
//                    }
//                }
//                echo '</div>';
//            }
//            ?>
        </div>
</div>

</form>

<div class="book-distr">
    <?php foreach ($book_distribution as $distribution): ?>
        <div class="distr">
            <h2>Название книги: <?= htmlspecialchars($distribution->id_book) ?></h2>
            <p>ФИО: <?= htmlspecialchars($distribution->id_read_ticket) ?></p>
            <p>Дата выдачи: <?= htmlspecialchars($distribution->date_issue) ?></p>
            <p>Дата возврата: <?= htmlspecialchars($distribution->return_date) ?></p>
            <h2>Статус: <?= htmlspecialchars($distribution->status) ?></h2>
        </div>
    <?php endforeach; ?>
</div>
