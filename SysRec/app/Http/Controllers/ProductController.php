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
		Product::createNodeProperty("Product",$data);
		
		$where = ([
			'Node' => 'Cliente',
			'Id' => 'teste',
			'NodeTwo' => 'Produto',
			'IdTwo' => 'Iphone 7',
			'Rel' => 'COMPROU'
	
		 ]);
	


		return $data;	
	}

}
