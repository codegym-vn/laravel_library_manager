<?php

namespace App\Http\Controllers;

use App\Models\Auther;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AuthersController extends Controller
{
    public function index(){
        $authers = \App\Models\Auther::paginate(5);
        return view('authers.list', compact('authers'));
    }

    public function create(){
        return view('authers.create');
    }

    public function store(Request $request){
        $auther = new Auther();
        $auther->name = $request->input('inputName');
        $auther->dob = $request->input('inputDob');
        $auther->address = $request->input('inputAddress');
        if ($request->hasFile('inputFile')) {
            $image = $request->file('inputFile');
            $path = $image->store('images', 'public');
            $auther->image = $path;
        }

        $auther->save();

        return redirect()->route('auther_index');
    }

    public function edit($id){
        $auther = Auther::findOrFail($id);
        return view('authers.edit', compact('auther'));
    }

    public function update(Request $request, $id)
    {
        $auther = Auther::findOrFail($id);
        $auther->name = $request->input('inputName');
        $auther->dob = $request->input('inputDob');
        $auther->address = $request->input('inputAddress');
        if ($request->hasFile('inputFile')) {
            $image = $request->file('inputFile');
            $path = $image->store('images', 'public');
            $auther->image = $path;
        }

        $auther->save();

        return redirect()->route('auther_index');
    }

    public function destroy($id){
        $auther = Auther::findOrFail($id);
        $auther->delete();
        return redirect()->route('auther_index');
    }
}
