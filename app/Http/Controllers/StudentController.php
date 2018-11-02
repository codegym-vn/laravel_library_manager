<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\RegisterBook;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class StudentController extends Controller
{
    public function list()
    {
        $students = Student::orderBy('id', 'desc')->get();;
        return view('students.list', compact('students'));
    }

    public function index()
    {
        $books_featured = Book::paginate(5);
        $books = Book::orderBy('created_at', 'desc')->take(6)->get();
        $author_f = Author::Where('name', 'Kim Dung')->take(4)->get();
        $authors = Author::all();
        $categories = Category::all();
        return view('index_layouts.index', compact('books', 'categories', 'books_featured', 'author_f', 'book_id_author', 'authors'));
    }

    public function category_list_book($id)
    {
        $books_featured = Book::paginate(5);
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $books = Book::where('id_category', $category->id)->get();
        return view('index_layouts.list_book', compact('category', 'books', 'categories', 'books_featured'));
    }

    public function list_author()
    {
        $books_featured = Book::paginate(5);
        $authors = Author::paginate(12);
        $categories = Category::all();
        return view('index_layouts.list_author', compact('authors', 'categories', 'books_featured'));
    }

    public function details_book($id)
    {
        $categories = Category::all();
        $book = Book::findOrFail($id);
        $category = Category::where('id', $book->id_category)->get();
        $books = Book::where('id_category', $book->id_category)->get();
        return view('index_layouts.details_book', compact('categories', 'category', 'author', 'book', 'books'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $keyword = $request->input('search');
        $books = Book::where('name', 'like', '%' . $keyword . '%')->get();
        $authors = Author::where('name', 'like', '%' . $keyword . '%')->get();
        $books_featured = Book::get()->take(5);
        $totalBookFilter = count($books);
        return view('index_layouts.search', compact('books', 'authors', 'categories', 'keyword', 'books_featured', 'totalBookFilter', 'books_author'));
    }

    public function form_resgister()
    {
        $categories = Category::all();
        $books = Book::where('quantity', '>', 0)->orderBy('quantity', 'desc')->get();
        return view('index_layouts.register_book', compact('categories', 'books'));
    }

    public function register(RegisterRequest $request)
    {
            $register = new RegisterBook();
            $register->student_name = $request->input('name_student');
            $register->class_name = $request->input('class');
            $register->phone_number = $request->input('phone');
            $register->email = $request->input('email');
            $register->name_book = $request->input('name_book');
            $register->borrowed_day = $request->input('borrowed_day');
            $register->save();

            Session::flash('success', 'Tạo mới thành công');
            return redirect()->back(compact('validated'));
        }
}



