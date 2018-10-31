<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\VarDumper\Dumper\esc;

class StudentController extends Controller
{
    public function list ()
    {
        $students = Student::orderBy('id','desc')->get();;
        return view('students.list', compact('students'));
    }

    public function index ()
    {
        $books_featured = Book::paginate(5);
        $books = Book::orderBy('created_at', 'dsc')->take(6)->get();
        $authors = Author::Where('name', 'Kim Dung')->take(4)->get();
//        $book_id_author = Book::groupBy('id_author', '>', '5')->take(4)->get();
        $categories = Category::all();
        return view('index_layouts.index', compact('books', 'categories', 'books_featured', 'authors', 'book_id_author'));
    }

    public function category_list_book ($id)
    {
        $books_featured = Book::paginate(5);
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $books = Book::where('id_category', $category->id)->get();
        return view('index_layouts.list_book', compact('category', 'books', 'categories', 'books_featured'));
    }

    public function list_author ()
    {
        $books_featured = Book::paginate(5);
        $authors = Author::paginate(12);
        $categories = Category::all();
        return view('index_layouts.list_author', compact('authors', 'categories', 'books_featured'));
    }

    public function details_book ($id)
    {
        $categories = Category::all();
        $book = Book::findOrFail($id);
        $category = Category::where('id', $book->id_category)->get();
        $books = Book::where('id_category', $book->id_category)->get();
        return view('index_layouts.details_book', compact('categories', 'category', 'author', 'book', 'books'));
    }

    public function search (Request $request)
    {
        $categories = Category::all();
        $keyword = $request->input('search');
        $books = Book::where('name', 'like', '%' . $keyword . '%')->get();
        $authors = Author::where('name', 'like', '%' . $keyword . '%')->get();
        $books_featured = Book::get()->take(5);
        $totalBookFilter = count($books);
        return view('index_layouts.search', compact('books', 'authors', 'categories', 'keyword', 'books_featured','totalBookFilter', 'books_author'));
    }

    public function author_list_book ($id)
    {
        $categories = Category::all();
        $author = Author::findOrFail($id);
        $books = Book::where('id_author', $id)->get();
        $categories = Category::all();
        return view('index_layouts.list_book_author_search', compact('categories', 'books', 'author', 'categories'));
    }
}
