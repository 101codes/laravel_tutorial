<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $cat_id=0;
        return view('index',compact('cat_id'));
    }
    public function setLanguage($locale)
    {
        session(['locale'=>$locale]);
        return redirect()->back();
    }
    public function cat($cat_id,$cat)
    {
        return view('index',compact('cat_id'));
    }
}
