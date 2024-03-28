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
        if ($request->method === 'POST' && User::create($request->all())) {
            return new View('site.signup', ['message' => 'Вы успешно зарегистрированы']);
        }
        return new View('site.signup');
    }

    public function login(): string
    {
        return new View('site.login', ['message' => 'hello working']);
    }
    public function logout(): string
    {
        return new View('site.logout', ['message' => 'hello working']);
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
