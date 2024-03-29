<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Post;
use Src\Auth\Auth;
use Src\View;
use Src\Request;
use Model\User;
use Src\Validator\Validator;


class Site

{

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup');
    }


    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function search(): string
    {
        return new View('site.search', ['message' => 'hello working']);
    }
//    public function addBook(): string
//    {
//        return new View('site.add_book', ['message' => 'hello working']);
//    }
    public function addReader(): string
    {
        return new View('site.add_reader', ['message' => 'hello working']);
    }
    public function addBook(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получение данных из формы
            $author = $_POST['author'];
            $title = $_POST['title'];
            $new_edition = $_POST['new_edition'];
            $annotation = $_POST['annotation'];

            // Здесь должен быть код для добавления книги в базу данных или другое хранилище данных

            // Переадресация на главную страницу после успешного добавления
            header('Location: ' . app()->route->getUrl('/hello'));
            exit;
        }

        // Если не была отправлена форма, просто выводим вид страницы добавления книги
        return new View('site.add_book', ['message' => 'hello working']);
    }

    public function addLibrarian(): string
    {
        return new View('site.add_librarian', ['message' => 'hello working']);
    }
    public function selection(): string
    {
        return new View('site.selection', ['message' => 'hello working']);
    }

}

//class Books
//{
//    public static function addBook(string $author, string $title, int $newEdition, string $annotation): void
//    {
//        // Add the book to the list of books
//        // ...
//    }
//}