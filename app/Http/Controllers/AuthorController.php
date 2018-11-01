<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index ()
    {
        $authors = Author::orderBy('id', 'desc')->get();
        return view('authors.list', compact('authors'));
    }

    public function create ()
    {
        return view('authors.create');
    }

    public function store (Request $request)
    {

        $rules = ['name' => 'required|min:3|max:20', 'dob' => 'required', 'address' => 'required',];

        $messages = ['name.required' => 'Tên sách không được phép để trống!', 'name.min' => 'Trường tên phải chứa ít nhất 3 ký tự!', 'name.max' => 'Trường tên không được phép vượt quá 20 ký tự!', 'dob.required' => 'Ngày sinh không được phép để trống!', 'address.required' => 'Địa chỉ không được phép để trống!',];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $author = new Author();
            $author->name = $request->input('inputName');
            $author->dob = $request->input('inputDob');
            $author->address = $request->input('inputAddress');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('images', 'public');
                $author->image = $path;
            }

            $author->save();

            //dung session de dua ra thong bao
            Session::flash('success', 'Tạo mới thành công');
            return redirect()->route('author_index');
        }
    }

    public function edit ($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update (Request $request, $id)
    {
        $rules = ['name' => 'required|min:3|max:20', 'dob' => 'required', 'address' => 'required',];

        $messages = ['name.required' => 'Tên sách không được phép để trống!', 'name.min' => 'Trường tên phải chứa ít nhất 3 ký tự!', 'name.max' => 'Trường tên không được phép vượt quá 20 ký tự!', 'dob.required' => 'Ngày sinh không được phép để trống!', 'address.required' => 'Địa chỉ không được phép để trống!',];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $author = Author::findOrFail($id);
            $author->name = $request->input('inputName');
            $author->dob = $request->input('inputDob');
            $author->address = $request->input('inputAddress');

            //cap nhap anh
            if ($request->hasFile('image')) {
                //xoa anh cu neu co
                $currentImg = $author->image;
                if ($currentImg) {
                    Storage::delete('/public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('image');
                $path = $image->store('images', 'public');
                $author->image = $path;
            }
            $author->save();

            //dung session de dua ra thong bao
            Session::flash('success', 'Cập nhật thành công');
            return redirect()->route('author_index');
        }
    }

    public function destroy ($id)
    {
        $author = Author::findOrFail($id);
        $book = Book::where('id_author', $author->id)->first();

        if ($book) {
            Session::flash('error', 'Không được phép xoá tác giả, nếu xoá sẽ ảnh hưởng tới dữ liệu!');
        } else {
            $image = $author->image;
            if ($image) {
                Storage::delete('/public/' . $image);
            }
            $author->delete();
            //dung session de dua ra thong bao
            Session::flash('success', 'Xóa thành công');
        }

        return redirect()->route('author_index');
    }
}
