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

		$data = ([
			'infos' => [
				'name' => $request->get("name"),
				'user' => userSession(),
				'create_date' => date("Y-m-d H:i:s"),
			]
		]);
		Category::createNodeProperty("Category", $data);

		return $data;
	}
}
