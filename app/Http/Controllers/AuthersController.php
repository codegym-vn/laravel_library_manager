<?php

namespace App\Http\Controllers;

use App\Model\Authers;
use Illuminate\Http\Request;

class AuthersController extends Controller
{
    public function index(){
        $authers = Authers::paginate(10);
        return view('authers.list', compact('authers'));
    }

    public function create(){
        return view('authers.create');
    }

    public function store(Request $request){
        $auther = new Authers();
        $auther->name = $request->input('inputName');
        $auther->dob = $request->input('inputDob');
        $auther->address = $request->input('inputAddress');
        // Neu file khong ton tai thi truong image gan null
        if ($request->hasFile('inputFile')){
            $auther->image = $request->input('inputFile');
        } else {
            $file = $request->file('inputFile');

            // Lay ra dinh dang va ten moi cua file tu request

            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->input('inputFileName');

            // gan ten moi cho file truoc khi luu server

            $newFileName = "$fileName.$fileExtension";

            // luu file vao thu muc storage/app/public/image voi ten moi

            $request->file('inputFile')->storeAs('public/images', $newFileName);

            // gan truong image cua doi tuong auther voi ten moi

            $auther->image = $newFileName;
        }

        $auther->save();

        return redirect()->route('auther.index');
    }

    public function edit($id){
        $auther = Authers::findOrFail($id);
        return view('authers.edit');
    }

    public function update(Request $request, $id)
    {
        $auther = Authers::findOrFail($id);
        $auther->name = $request->input('inputName');
        $auther->dob = $request->input('inputDob');
        $auther->address = $request->input('inputAddress');
        // Neu file khong ton tai thi truong image gan null
        if ($request->hasFile('inputFile')) {
            $auther->image = $request->input('inputFile');
        } else {
            $file = $request->file('inputFile');

            // Lay ra dinh dang va ten moi cua file tu request

            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->input('inputFileName');

            // gan ten moi cho file truoc khi luu server

            $newFileName = "$fileName.$fileExtension";

            // luu file vao thu muc storage/app/public/image voi ten moi

            $request->file('inputFile')->storeAs('public/images', $newFileName);

            // gan truong image cua doi tuong auther voi ten moi

            $auther->image = $newFileName;
        }
        $auther->save();

        return redirect()->route('auther.index');
    }

    public function destroy($id){
        $auther = Authers::findOrFail($id);
        $auther->delete();
        return redirect()->route('auther.index');
    }
}
