<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $title = "Home";
        return view('frontend.index',compact('title'));
    }
}
