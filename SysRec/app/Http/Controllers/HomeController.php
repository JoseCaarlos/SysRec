<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function produto()
    {   
        


        $count = 0;
        $strSup = "";
        $link = "{{route('produtoDetalhe')}";
        var_dump($link);
 exit;        
        $dataSup = Product::matchNodeProduct("Product");
        foreach ($dataSup->getrecords() as $r) :
            $count++;
            $strSup .= "
            <div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
            <div class='block2'>
                                
            <div class='block2-img wrap-pic-w of-hidden pos-relative block2-labelnew'>
                <img src='{$r->value('file')}' alt='IMG-PRODUCT'>

                <div class='block2-overlay trans-0-4'>
                    <a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
                        <i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
                        <i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
                    </a>

                    <div class='block2-btn-addcart w-size1 trans-0-4'>
                        <!-- Button -->
                        <button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class='block2-txt p-t-20'>
            <a href="."\"{{route('produtoDetalhe')}}\""." class='block2-name dis-block s-text3 p-b-5'>
                {$r->value('name')}
           </a>

                <span class='block2-price m-text6 p-r-5'>
                    {$r->value('price')}
                </span>
            </div>
        </div>
    </div>

            ";
        endforeach;
        $count .= " results";

        return view('product', compact('strSup', 'count'));
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

    public function category()
    {
        return view('category');
    }
}
