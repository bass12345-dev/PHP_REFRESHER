<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index(){
        $data['title'] = 'CRUD';
        $data['gender'] = ['male','female'];
        $data['status'] = ['active','inactive'];
        return view('crud.main.form')->with($data);
        
    }


    //CREATE
    public function add_user(Request $request){

        // dd($request->collect());
        // return redirect('/home');
        // $value = $request->prefers(['text/html', 'application/json']);
        // dd($value);
        // return redirect('/home');

        // if($request->isMethod('post')){
        //     dd($request->all());
        // }

        return redirect('/home')->with('message','Added Successfully');

        
            
    
    }
}
