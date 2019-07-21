<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		if (!isAdmin()) {
			return redirect()->route('home');
		}
		return view('category');
	}

	public function register(Request $request)
	{
		$categoryName =  $request->get("name");
		$data = ([
			'infos' => [
				'name' => $categoryName,
				'user' => userSession(),
				'create_date' => date("Y-m-d H:i:s"),
			]
		]);
		$alert ="";
		try{
			
			Category::createNodeProperty("Category", $data);
		}
		catch(\GraphAware\Neo4j\Client\Exception\Neo4jException $e){
				if(Category::verificarCategoria($categoryName)){
					$alert = "error";
					return view('category', compact('alert'));
				}
			
				
		}

		 
		$alert = "success";
		return view('category', compact('alert'));
	}
}
