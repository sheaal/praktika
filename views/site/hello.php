<?php //foreach ($books as $book) {
//    echo '<p>' . $book->id_author . '</p>';
//    echo '<p>' . $book->title . '</p>';
//    echo '<p>' . $book->annotation . '</p>';
//    echo '<p>';
//    if ($book->new_edition == 1) {
//        echo "Да";
//    } elseif ($book->new_edition == 0) {
//        echo "Нет";
//    }
//    echo '</p>';
//}
//    ?>

<style>
    .book-list{
        color: white;
        display: flex;
        gap: 20px;
        margin-top: 30px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .boook{
        width: 300px;
        height: 300px;
        background-color: #472d6d;
        border-radius: 10px;
        padding: 7px 0 0 10px;
    }
</style>

<div class="book-list">
    <?php foreach ($books as $book): ?>
        <div class="boook">
            <h2><?= htmlspecialchars($book->title) ?></h2>
            <p>Автор: <?= htmlspecialchars($book->id_author) ?></p>
            <p>Аннотация: <?= htmlspecialchars($book->annotation) ?></p>
            <p>Новое издание: <?= htmlspecialchars($book->new_edition == 1 ? 'Да' : 'Нет') ?></p>
            <img src="<?= htmlspecialchars($book->image) ?>" alt="<?= htmlspecialchars($book->title) ?>">
            <h2><?= htmlspecialchars($book->title) ?></h2>
        </div>
    <?php endforeach; ?>
</div>
