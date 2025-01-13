<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{

    public function index(){
        return view('pages.admin.index',[
            'nama' => Session::get('nama')
        ]);
    }

}
