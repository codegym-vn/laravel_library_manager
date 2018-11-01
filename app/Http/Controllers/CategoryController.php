<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $rules = ['name' => 'required|min:3|max:20',];

        $messages = ['name.required' => 'Tên sách không được phép để trống!', 'name.min' => 'Trường tên phải chứa ít nhất 3 ký tự!', 'name.max' => 'Trường tên không được phép vượt quá 20 ký tự!',];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $category = new Category();
            $category->name = $request->input('name');
            $category->save();

            //dung session de dua ra thong bao
            Session::flash('success', 'Tạo mới thành công thể loại');
            //tao moi xong quay ve trang danh sach task
            return redirect()->route('categories_index');
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
        $category = Category::FindOrFail($id);
        return view('categories.edit', compact('category'));
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
        $rules = ['name' => 'required|min:3|max:20',];

        $messages = ['name.required' => 'Tên sách không được phép để trống!', 'name.min' => 'Trường tên phải chứa ít nhất 3 ký tự!', 'name.max' => 'Trường tên không được phép vượt quá 20 ký tự!',];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $category = Category::FindOrFail($id);
            $category->name = $request->input('name');
            $category->save();

            //dung session de dua ra thong bao
            Session::flash('success', 'Cập nhật thành công thể loại');
            //tao moi xong quay ve trang danh sach task
            return redirect()->route('categories_index');
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
        $category = Category::FindOrFail($id);
        $book = Book::where("id_category", $category->id)->first();

        if ($book) {
            Session::flash('error', 'Không được phép xoá thể loại, nếu xoá sẽ ảnh hưởng tới dữ liệu!');
        } else {
            dd(11);
            $category->delete();
            //dung session de dua ra thong bao
            Session::flash('success', 'Xóa thành công thể loại');
        }
        //xoa xong quay ve trang danh sach task
        return redirect()->route('categories_index');
    }
}
