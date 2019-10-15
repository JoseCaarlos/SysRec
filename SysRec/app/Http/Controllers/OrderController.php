<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use GraphAware\Bolt\Protocol\V1\Session;
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

	public function finalizar(){
		$data = ([
			'infos' => [
                'compra' => 1,
                'idCli' => intVal(Session('id')),
				'idPro' => null,    
				'discount' => 0,
				'totalOrder' => 150
			]
        ]);
        $rel = ([
			'idCli' => Session('id'),
			'quantity' => 0
		]);
		$data = Order::finalSale($data, $rel);
		$para = (empty(session('id'))) ? 'null' : session('id');
        $data = Order::matchNodeOrder($para);
        $dataRecom = Product::collaborativeFiltration(Session('id'));
        return view('home', ['data' => $data->getRecords(), 'dataRecom' => $dataRecom->getRecords()]);
	}
	
}
