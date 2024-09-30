<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data['title'] = 'CRUD';
        $data['gender'] = ['male','female'];
        $data['status'] = ['active','inactive'];
        return view('crud.main.form')->with($data);
    }
}
