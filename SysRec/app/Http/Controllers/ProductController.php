<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
				'costs_price' => $request->get("costs_price"),
				'sales_price' => $request->get("sales_price"),
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
		Product::createNodeProductProperty("Product", $data, $rel);
		$id= 32;
		if ($request->hasFile('primaryImage')) {
			$data->path_image = $repo->saveImage($request->primaryImage, $id, 'products', 250);
		 }

		return $data;
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
}
