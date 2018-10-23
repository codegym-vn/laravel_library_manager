<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::paginate(3);
        return view('authors.list', compact('authors'));
    }

    public function create(){
        return view('authors.create');
    }

    public function store(Request $request){
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

    public function edit($id){
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
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

    public function destroy($id){
        $author = Author::findOrFail($id);
        $image = $author->image;

        if ($image) {
            Storage::delete('/public/'.$image);
        }

        $author->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('author_index');
    }
}
