<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function produto(Request $request)
    {   
        var_dump(session('name'));
        var_dump(session('email'));
        $dataSup = Product::matchNodeProduct("Product");
        $count = count($dataSup->getRecords());
        $category = Category::matchNode("Category");

        return view('product',['dataSup' => $dataSup->getRecords(), 'category' => $category->getRecords(),'count' => $count]);
    }

    public function produtoDetalhe($id)
    {   
        $p = Product::matchNodeId("Product", $id);
        $dataRel = Product::matchNodeRel($id);
        return view('productDetail', ['p' => $p->getRecord(),'dataRel' => $dataRel->getRecords()]);
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

    public function category()
    {
        return view('category');
    }
}
