<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
		return false;
	}
	
	public function register(Request $request)
	{

		$data = ([
			'infos' => [ 'name' => $request->get("name"),
						 'cnpj' => $request->get("cnpj"),
						 'phone_number' => $request->get("phone_number"),
						 'telephone' => $request->get("telephone"),
						 'email' => $request->get("email"),	
						 'postal_code' => $request->get("postal_code"),
						 'street' => $request->get("street"),
						 'street_number' => $request->get("street_number"),
						 'neighborhood' => $request->get("neighborhood"),
						 'city' => $request->get("city"),
						 'state' => $request->get("state"),	 
						 'complement' => $request->get("complement"),
					   ]
		 ]);
		 Supplier::createNodeProperty("Supplier",$data);
		
		return $data;	
	}

}
