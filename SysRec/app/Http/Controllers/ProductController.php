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
			'infos' => [ 'name' => $request->get("name"),
						 'category_id' => $request->get("category_id"),
						 'supplier_id' => $request->get("supplier_id"),
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
		$strSup = "";
		$dataSup = Product::matchNode("Supplier");
		foreach($dataSup->getrecords() as $r):
			$strSup .= "\n\t\t\t\t\t\t\t\t<option value='".$r->value('id')."'>".$r->value('name')."</option>";
		endforeach;
	   
	   	$strCat = "";
	   	$dataCat = Product::matchNode("Category");
	   	foreach($dataCat->getrecords() as $r):
			$strCat .= "\n\t\t\t\t\t\t\t\t<option value='".$r->value('id')."'>".$r->value('name')."</option>";
	   	endforeach;

        return view('registerProduct', compact('strCat','strSup'));
    }


}
