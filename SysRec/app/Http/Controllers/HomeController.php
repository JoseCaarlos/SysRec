<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
        {
        return view('home');
        }

    public function produto()
    {
        return view('product');
    }

    public function produtoDetalhe()
    {
        return view('productDetail');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function cart()
    {
        return view('cart');
    }

    public function client()
    {
        return view('client');
    }

    public function register()
    {
        return view('register');
    }
}
