<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
		return false;
	}
	
	public function register(Request $request)
	{

		$data = ([
			'infos' => [ 'category_id' => $request->get("category_id"),
						 'supplier_id' => $request->get("supplier_id"),
						 'name' => $request->get("name"),
						 'price' => $request->get("price"),
						 'describ' => $request->get("describ"),
						 'height' => $request->get("height"),
						 'width' => $request->get("width"),
						 'depth' => $request->get("depth"),	 
						 'weight' => $request->get("weight"),
						 'sac' => $request->get("sac")
					   ]
		]);
		$rel = ([
			'idOne' => $request->get("category_id"),
			'idTwo' => $request->get("supplier_id"),
			 ]);
		Product::createNodeProductPropertyProperty("Product",$data,$rel);

		return $data;	
	}
	public function product()
    {   
        $data['data'] = Product::matchNode("Supplier");

        return view('registerProduct', compact('data'));
    }


}
