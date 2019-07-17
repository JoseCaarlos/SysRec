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
}
