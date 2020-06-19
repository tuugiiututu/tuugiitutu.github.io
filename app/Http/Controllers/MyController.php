<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NavBar;

class MyController extends Controller
{
    public function index()
    {
        $navs= NavBar::select()->get();
        return view('welcome',compact('navs'));
    }
    public function election()
    {
        $navs= NavBar::select()->get();
        return view('election',compact('navs'));
    }
    public function education()
    {
        $navs= NavBar::select()->get();
        return view('education',compact('navs'));
    }
    public function news()
    {
        $navs= NavBar::select()->get();
        return view('news',compact('navs'));
    }
    public function around()
    {
        $navs= NavBar::select()->get();
        return view('around',compact('navs'));
    }
    public function page()
    {
        $navs= NavBar::select()->get();
        return view('page',compact('navs'));
    }
}
