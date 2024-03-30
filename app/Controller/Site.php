<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Post;
use Model\Book;
use Model\Reader;
use Src\Auth\Auth;
use Src\View;
use Src\Request;
use Model\User;
use Src\Validator\Validator;


class Site

{

    public function hello(): string
    {
        $books = Book::all();
        return new View('site.hello', ['books' => $books]);
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
        if (isset($_POST['search'])) {
            // Validate the search form
            $validation = new Validator($_POST, [
                'author' => [new RequireValidator()],
                'title' => [new RequireValidator()],
                'document-type' => [new RequireValidator()],
            ], [
                'document-type' => 'Тип документа',
            ]);

            if (!$validation->isValid()) {
                // Display the search form with error messages
                return new View('site.search', [
                    'message' => 'hello working',
                    'errors' => $validation->getErrors(),
                ]);
            }

            // Perform the search
            $query = DB::table('documents');

            if ($_POST['author']) {
                $query->where('author', 'like', '%' . $_POST['author'] . '%');
            }

            if ($_POST['title']) {
                $query->where('title', 'like', '%' . $_POST['title'] . '%');
            }

            if ($_POST['document-type']) {
                $query->where('document-type', $_POST['document-type']);
            }

            $results = $query->get();

            // Display the search results
            return new View('site.search_results', [
                'message' => 'hello working',
                'results' => $results,
            ]);
        }

        // Display the search form
        return new View('site.search', ['message' => 'hello working']);
    }
    public function addReader(Request $request): string
    {
        $title = Reader::all();
        if ($request->method === 'POST' && Reader::create($request->all())) {
            $message = 'Читатель успешно добавлен!';
        } else {
            $message = '';
        }

        return new View('site.add_reader', ['title' => $title, 'message' => $message]);
    }


    public function addBook(Request $request): string
    {
        $title = Book::all();
        if ($request->method === 'POST' && Book::create($request->all())) {
            $message = 'Книга успешно добавлена!';
        } else {
            $message = '';
        }

        return new View('site.add_book', ['title' => $title, 'message' => $message]);
    }
//    public function addBook(Request $request): string
//    {
//        $title = Book::all();
//        $message = '';
//
//        if ($request->method === 'POST') {
//            $data = $request->all();
//
//            // Handle image upload
//            if (isset($data['image']) && $data['image']['name']) {
//                $imageName = time() . '_' . basename($data['image']['name']);
//                move_uploaded_file($data['image']['tmp_name'], public_path('images') . $imageName);
//                $data['image'] = 'images/' . $imageName;
//            }
//
//            Book::create($data);
//            $message = 'Книга успешно добавлена!';
//        }
//
//        return new View('site.add_book', ['title' => $title, 'message' => $message]);
//    }


    public function addLibrarian(): string
    {
        return new View('site.add_librarian', ['message' => 'hello working']);
    }
    public function selection(): string
    {
        return new View('site.selection', ['message' => 'hello working']);
    }

}

