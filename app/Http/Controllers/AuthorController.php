<?php

namespace App\Http\Controllers;

use App\Model\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::paginate(5);
        return view('authors.list', compact('authors'));
    }

    public function create(){
        return view('authors.create');
    }

    public function store(Request $request){
        $auther = new Author();
        $auther->name = $request->input('inputName');
        $auther->dob = $request->input('inputDob');
        $auther->address = $request->input('inputAddress');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $auther->image = $path;
        }

        $auther->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('auther_index');
    }

    public function edit($id){
        $auther = Author::findOrFail($id);
        return view('authors.edit', compact('auther'));
    }

    public function update(Request $request, $id)
    {
        $auther = Author::findOrFail($id);
        $auther->name = $request->input('inputName');
        $auther->dob = $request->input('inputDob');
        $auther->address = $request->input('inputAddress');

        //cap nhap anh
        if ($request->hasFile('image')) {
            //xoa anh cu neu co
            $currentImg = $auther->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            //cap nhap anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $auther->image = $path;
        }
        $auther->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('auther_index');
    }

    public function destroy($id){
        $auther = Author::findOrFail($id);
        $image = $auther->image;

        if ($image) {
            Storage::delete('/public/'.$image);
        }

        $auther->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('auther_index');
    }
}
