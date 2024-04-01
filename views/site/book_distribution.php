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
</style>

<div class="book-distr">
    <?php foreach ($distribution as $bookDistribution): ?>
        <div class="distr">
            <h2>Id книги: <?= htmlspecialchars($bookDistribution->id_book) ?></h2>
            <p>Id читательского билета: <?= htmlspecialchars($bookDistribution->id_read_ticket) ?></p>
            <p>Дата выдачи: <?= htmlspecialchars($bookDistribution->date_issue) ?></p>
            <p>Дата возврата: <?= htmlspecialchars($bookDistribution->return_date) ?></p>
            <h2>Статус: <?= htmlspecialchars($bookDistribution->status) ?></h2>
        </div>
    <?php endforeach; ?>
</div>
