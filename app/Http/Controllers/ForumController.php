<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Request $request){
    
        return view('/main/index');
    }

    public function add(){
        return view('/main/addforum');
    }

    public function list(){
        return view('/main/listforum');
    }

    public function detail(){
        return view('/main/detailforum');
    }
}
