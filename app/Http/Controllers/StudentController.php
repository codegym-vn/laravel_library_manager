<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index(){
        $books_featured = Book::paginate(5);
        $books = Book::paginate(12);
        $categories = Category::all();
        return view('index_layouts.index', compact('books','categories', 'books_featured'));
    }

    public function category_list_book($id){
        $books_featured = Book::paginate(5);
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $books = Book::where('id_category', $category->id)->get();
        return view('index_layouts.list_book', compact('category', 'books', 'categories','books_featured'));
    }

    public function list_author(){
        $books_featured = Book::paginate(5);
        $authors = Author::paginate(12);
        $categories = Category::all();
        return view('index_layouts.list_author', compact('authors','categories','books_featured'));
    }

    public function details_book($id){
        $categories = Category::all();
        $book = Book::findOrFail($id);
        $category = Category::where('id',$book->id_category)->get();
        $books = Book::where('id_category', $book->id_category)->get();
        return view('index_layouts.details_book', compact('categories', 'category', 'author', 'book', 'books'));
    }

    public function search(Request $request){
        $categories = Category::all();
        $keyword = $request->input('search');
        $books = Book::where('name', 'like', '%' . $keyword . '%')->get();
        $authors = Author::where('name', 'like', '%' . $keyword . '%')->get();
        return view('index_layouts.search', compact('books', 'authors', 'categories', 'keyword'));
    }

    public function author_list_book($id){
        $categories = Category::all();
        $author = Author::findOrFail($id);
        $books = Book::where('id_category', $id)->get();
        return view('index_layouts.list_book_author_search', compact('categories', 'books', 'author'));
    }
}
