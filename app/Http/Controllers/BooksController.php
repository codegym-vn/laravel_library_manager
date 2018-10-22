<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $category = Category::all();
        $books = Book::paginate(3);
        return view('books.list', compact('books', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $book = new Book();
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->quantity = $request->input('quantity');
        $book->id_category = $request->input('id_category');
        $book->id_author = $request->input('id_author');

        //upload file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }

        $book->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('books_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $categories = Category::all();
        $book = Book::FindOrFail($id);
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        $book = Book::FindOrFail($id);
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->quantity = $request->input('quantity');
        $book->id_category = $request->input('id_category');

        //cap nhap anh
        if ($request->hasFile('image')) {
            //xoa anh cu neu co
            $currentImg = $book->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            //cap nhap anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }
        $book->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('books_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $book = Book::FindOrFail($id);
        $image = $book->image;

        //delete image
        if ($image) {
            Storage::delete('/public/' . $image);
        }
        $book->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('books_index');
    }

    public function searchBook (Request $request)
    {
        $keyword = $request->input('searchBook');
        $books = Book::where('name', 'like', '%' . $keyword . '%')->paginate(1);

        return view('books.list', compact('books'));
    }
}
