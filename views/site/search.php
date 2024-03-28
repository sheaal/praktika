<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Поиск</title>
    <style>
        header{
            width: 1920px;
        }
        h1{
            margin-top: 20px;
            margin-left: 20px;
        }
        .search-block1 {
            margin-top: 30px;
            margin-left: 300px;
            float: left;
        }
        .search-block2 {
            margin-right: 300px;
            float: right;
        }
        fieldset{
            display: flex;
            flex-direction: column;
        }
        button{
            margin-top: 50px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
</head>
<body>
<header>
    <h1>Поиск</h1>
</header>
<main>
    <form id="search-form">
        <div class="search-block1">
            <label for="author">Автор:</label>
            <input type="text" id="author" name="author">
            <br>
            <label for="title">Название:</label>
            <input type="text" id="title" name="title">
        </div>

        <div class="search-block2">
            <br>
            <fieldset id="document-type">
                <legend>Тип документа:</legend>
                <label><input type="checkbox" value="books" name="document-type">Книги</label>
                <label><input type="checkbox" value="articles" name="document-type">Многотомные издания</label>
                <label><input type="checkbox" value="articles" name="document-type">Статьи</label>
                <label><input type="checkbox" value="articles" name="document-type">Диссертации</label>
                <label><input type="checkbox" value="articles" name="document-type">Журналы, газеты</label>
            </fieldset>
            <br>
        </div>
        <br>
        <button type="submit">Найти</button>
    </form>
</main>

</body>
</html>