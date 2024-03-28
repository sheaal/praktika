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

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.signup');
    }
//        if ($request->method === 'POST' && User::create($request->all())) {
//            return new View('site.signup', ['message' => 'Вы успешно зарегистрированы']);
//        }
//        return new View('site.signup');

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
    public function addBook(): string
    {
        return new View('site.add_book', ['message' => 'hello working']);
    }
    public function addReader(): string
    {
        return new View('site.add_reader', ['message' => 'hello working']);
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
