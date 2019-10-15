<?php

namespace App\Http\Controllers;

use App\Models\Product;	
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\ImageRepository;

class ProductController extends Controller
{
	public function index()
	{
		return false;
	}

	public function register(Request $request, ImageRepository $repo)
	{

		$data = ([
			'infos' => [
				'name' => $request->get("name"),
				'category_id' => $request->get("category_id"),
				'supplier_id' => $request->get("supplier_id"),
				'costs_price' => floatval($request->get("costs_price")),
				'sales_price' => floatval($request->get("sales_price")),
				'describ' => $request->get("describ"),
				'height' => $request->get("height"),
				'width' => $request->get("width"),
				'depth' => $request->get("depth"),
				'weight' => $request->get("weight"),
				'sac' => $request->get("sac"),
				'path_file' => ''
			]
		]);
		$rel = ([
			'idOne' => $request->get("category_id"),
			'idTwo' => $request->get("supplier_id"),
		]);
		$id= 32;
		$i=0;
		if ($request->hasFile('primaryImage')) {
			//foreach ($request->primaryImage as $image) {
				$data['infos']['path_file'] = $repo->saveImage($request->primaryImage, $request->get("name"), 'products', 1080);
		}

		Product::createNodeProductProperty("Product", $data, $rel);
		return $data;
	}


	public function selection(){
		$dataProduct = Product::matchNode("Product");
		$strProduct = "";
		foreach ($dataProduct->getrecords() as $r) :
			$strProduct .= "\n\t\t\t\t\t\t\t\t<option value='" . $r->value('id') . "'>" . $r->value('name') . "</option>";
		endforeach;

		return view('selectionProduct', compact('strProduct'));
	}

	public function product()
	{
		$strSup = "";
		$dataSup = Product::matchNode("Supplier");
		foreach ($dataSup->getrecords() as $r) :
			$strSup .= "\n\t\t\t\t\t\t\t\t<option value='" . $r->value('id') . "'>" . $r->value('name') . "</option>";
		endforeach;

		$strCat = "";
		$dataCat = Product::matchNode("Category");
		foreach ($dataCat->getrecords() as $r) :
			$strCat .= "\n\t\t\t\t\t\t\t\t<option value='" . $r->value('id') . "'>" . $r->value('name') . "</option>";
		endforeach;

		return view('registerProduct', compact('strCat', 'strSup'));
	}

	public function filterCat($id){
		$dataSup = Product::matchNodeProductCat("Product",$id);
		$count = count($dataSup->getRecords());
		$category = Category::matchNode("Category");
		return view('product',['dataSup' => $dataSup->getRecords(),'category' => $category->getRecords(), 'count' => $count]);
	}

	public function filterPreco($inf, $sup){
		$data = Product::matchNodePrice($inf, $sup);

	}

	public function addCart($id){
		
	}

}
