<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Post;
use Src\Auth\Auth;
use Src\View;
use Src\Request;
use Model\User;


class Site

{
//    public function index(): string
//    {
//        $posts = Post::all();
//        return (new View())->render('site.post', ['posts' => $posts]);
//    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method==='POST' && User::create($request->all())){
            return new View('site.signup', ['message'=>'Вы успешно зарегистрированы']);
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

    public function search(Request $request): string
    {
        return new View('site.search');
    }
//    public function search(Request $request)
//    {
//        $author = $request->get('author');
//        $title = $request->get('title');
//        $documentType = $request->get('document-type');
//
//        // Дальнейшая логика обработки запроса, например, поиск в базе данных
//
//        return new View('site.search', ['author' => $author, 'title' => $title, 'documentType' => $documentType]);
//    }

    public function addBook(Request $request): void
    {
        if ($request->method === 'POST') {
            // Добавить вашу логику для добавления новой книги здесь.

            // После успешного добавления книги, выполнить редирект на другую страницу.
            app()->route->redirect('/hello'); // Например, перенаправим на главную страницу.
        } else {
            // Обработка других случаев, например, показ сообщения об ошибке или перенаправление на страницу ошибки.
        }
    }
//    public function addBook(Request $request): void
//    {
//        // Add your logic for adding a new book here.
//
//        // Redirect back to the main page after adding the book.
//        app()->route->redirect('/add_book');
//    }


}
