<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
		return false;
	}
	
	public function register(Request $request)
	{

		$data = ([
			'infos' => [ 
						 'name' => $request->get("name"),
					   ]
		]);
		Category::createNodeProperty("Category",$data);
		
		return $data;	
	}

}
