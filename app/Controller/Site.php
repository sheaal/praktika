<?php

namespace Controller;

use DateTime;
use Illuminate\Database\Capsule\Manager as DB;
use Model\Post;
use Model\Book;
use Model\Reader;
use Model\Author;
use Model\Addreader;
use Src\Auth\Auth;
use Src\View;
use Src\Request;
use Model\User;
use Model\BookDistribution;
use Src\Validator\Validator;



class Site

{
//    public function __construct(Request $request)
//    {
//        $this->request = $request;
//    }

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
        $readers = Addreader::all();
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'surname' => ['required', 'alpha'],
                'name' => ['required', 'alpha'],
                'patronymic' => ['required', 'alpha'],
//                'phone' => ['required', 'digits:11' => 'Поле :field должно содержать ровно 11 цифр'],
            ], [
                'required' => 'Поле :field пусто',
                'alpha' => 'Поле :field не должно содержать цифры',
                'alpha_num' => 'Поле :field не должно содержать специальных символов',
//                'digits' => 'В поле :field должно быть 11 цифр'
//                'regex' => 'Поле :field не должно содержать буквы'
            ]);

            if($validator->fails()){
                return new View('site.add_reader',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE),
                        'readers' => $readers
                    ]);
            }

            $title = Reader::all();
            if ($request->method === 'POST' && Reader::create($request->all())) {
                $message = 'Читатель успешно добавлен!';
            } else {
                $message = '';
            }

        }
        return new View('site.add_reader');
    }


    public function addBook(Request $request): string
    {
        $authors = Author::all();
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'title' => ['required'],
                'id_author' => ['required'],
                'annotation' => ['required'],
                'new_edition' => ['required'],
            ], [
                'required' => 'Поле :field пусто',

            ]);

            if($validator->fails()){
                return new View('site.add_book',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE),
                        'authors' => $authors
                        ]);
            }

            if (Book::create($request->all())) {
                $message = 'Книга успешно добавлена!';
                app()->route->redirect('/add_book');

            }

        }
        return new View('site.add_book', ['authors' => $authors]);

    }


    public function addLibrarian(): string
    {
        return new View('site.add_librarian', ['message' => 'hello working']);
    }
    public function selection($request): string
    {
        $books = Book::all();
        $readers = Reader::all();
        $book_distribution = BookDistribution::all();

        // Проверяем была ли отправлена форма
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_read_ticket'])) {
            $selected_reader_id = $_POST['id_read_ticket'];

            $selected_reader = null;
            foreach ($readers as $reader) {
                if ($reader->id_read_ticket == $selected_reader_id) {
                    $selected_reader = $reader;
                    break;
                }
            }
            return new View('site.selection', [
                'book_distribution' => $book_distribution,
                'books' => $books,
                'readers' => $readers,
                'selected_reader' => $selected_reader
            ]);
        }

        return new View('site.selection', ['book_distribution' => $book_distribution, 'books' => $books, 'readers' => $readers]);
    }

    public function bookDistribution(Request $request): string
    {
        $books = Book::all();
        $readers = Reader::all();
        $book_distribution = BookDistribution::all();

        if ($request->method === 'POST') {
            $date_issue = new \DateTime($request->input('date_issue'));
            $return_date = new \DateTime($request->input('return_date'));

            if ($date_issue > $return_date) {
                return new View('site.book_distribution', [
                    'message' => '!Дата выдачи не может быть позже даты возврата!',
                    'book_distribution' => $book_distribution,
                    'books' => $books,
                    'readers' => $readers
                ]);
            } else {
                if (BookDistribution::create($request->all())) {
                    $message = 'Выдача прошла успешно!';
                    app()->route->redirect('/book_distribution');
                }
            }
        }

        return new View('site.book_distribution', ['book_distribution' => $book_distribution,
            'books' => $books, 'readers' => $readers]);
    }
}

