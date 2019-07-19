<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
		return false;
	}
	
	public function register(Request $request)
	{

		$data = ([
			'infos' => [ 'client_id' => $request->get("client_id"),
						 'order_date' => $request->get("order_date"),
						 'postal_code' => $request->get("postal_code"),
						 'street' => $request->get("street"),
						 'street_number' => $request->get("street_number"),
						 'neighborhood' => $request->get("neighborhood"),
						 'city' => $request->get("city"),
						 'state' => $request->get("state"),	 
						 'complement' => $request->get("complement"),
					   ]
		 ]);
		 Order::createNodeProperty("Order",$data);
		
		return $data;	
	}

}
