<?php

namespace App\Http\Controllers;


use App\Models\Author;
use App\Models\Bill;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
//        $one_days_ago = date('Y-m-d', strtotime('-1 days'));

        $books = Book::orderBy('id', 'desc')->get();
        $authors = Author::all();
        $categories = Category::all();
        return view('books.list', compact('books', 'authors', 'categories'));
    }

    public function filterBy (Request $request)
    {
        $idAuthor = $request->input('author');
        $idCategory = $request->input('category');

        $authorFilter = Author::find($idAuthor);
        $categoryFilter = Category::find($idCategory);

        if (!$authorFilter && !$categoryFilter) {
            Session::flash('error', 'Hãy chọn dữ liệu cần tìm!');
            return redirect()->route('books_index');
        }

        //dieu kien de loc sach
        if ($authorFilter && !$categoryFilter) {
            $books = Book::where('id_author', $authorFilter->id)->orderBy('name', 'asc')->paginate(2);
            $totalBookFilter = count($books);
        } else if (!$authorFilter && $categoryFilter) {
            $books = Book::where('id_category', $categoryFilter->id)->orderBy('name', 'asc')->paginate(2);
            $totalBookFilter = count($books);
        }
        if ($authorFilter && $categoryFilter) {
            $books = Book::where('id_author', $authorFilter->id)->where('id_category', $categoryFilter->id)->orderBy('name', 'asc')->paginate(2);
            $totalBookFilter = count($books);
        }


        $authors = Author::all();
        $categories = Category::all();

        return view('books.list', compact('books', 'authors', 'totalBookFilter', 'authorFilter', 'categoryFilter', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('books.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:20',
            'description' => 'required',
            'quantity' => 'required|numeric'
        ];

        $messages = [
            'name.required' => 'Tên sách không được phép để trống!',
            'name.min' => 'Trường tên phải chứa ít nhất 3 ký tự!',
            'name.max' => 'Trường tên không được phép vượt quá 20 ký tự!',
            'description.required' => 'Nội dung không được phép để trống!',
            'quantity.required' => 'Số lượng không được phép để trống!',
            'quantity.numeric' => 'Số lượng phải nhập số không được nhập chữ!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        $book = Book::FindOrFail($id);
        return view('books.detail', compact('book'));
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
        $authors = Author::all();
        $book = Book::FindOrFail($id);
        return view('books.edit', compact('book', 'categories', 'authors'));
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
        $rules = [
            'name' => 'required|min:3|max:30',
            'description' => 'required',
            'quantity' => 'required|numeric'
        ];

        $messages = [
            'name.required' => 'Tên sách không được phép để trống!',
            'name.min' => 'Trường tên phải chứa ít nhất 3 ký tự!',
            'name.max' => 'Trường tên không được phép vượt quá 30 ký tự!',
            'description.required' => 'Nội dung không được phép để trống!',
            'quantity.required' => 'Số lượng không được phép để trống!',
            'quantity.numeric' => 'Số lượng phải nhập số không được nhập chữ!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $book = Book::FindOrFail($id);
            $book->name = $request->input('name');
            $book->description = $request->input('description');
            $book->quantity = $request->input('quantity');
            $book->id_category = $request->input('id_category');
            $book->id_author = $request->input('id_author');

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
        $bill = Bill::where("id_book", $book->id)->first();
        if ($bill) {
            Session::flash('error', 'Sách đang cho mượn không được phép xoá!');
        } else {
            $image = $book->image;

            //delete image
            if ($image) {
                Storage::delete('/public/' . $image);
            }
            $book->delete();

            //dung session de dua ra thong bao
            Session::flash('success', 'Xóa thành công');
        }

        return redirect()->route('books_index');
    }

//    public function searchBook (Request $request)
//    {
//        $keyword = $request->input('searchBook');
//        $books = Book::where('name', 'like', '%' . $keyword . '%')->paginate(1);
//
//        return view('books.list', compact('books'));
//    }
}
