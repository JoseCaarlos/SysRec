<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Http\Client\Common\Exception\ClientErrorException;

class ClientController extends Controller
{
    public function index()
    {
		return false;
	}
	
	public function register(Request $request)
	{

		$data = ([
			'infos' => [ 'first_name' => $request->get("first_name"),
						 'last_name' => $request->get("last_name"),
						 'gender' => $request->get("gender"),
						 'phone_number' => $request->get("phone_number"),
						 'telephone' => $request->get("telephone"),
						 'email' => $request->get("email"),						 
						 'cpf' => $request->get("cpf"),
						 'rg' => $request->get("rg"),		
						 'password' => $request->get("password"),
						 'confirm_password' => $request->get("confirm_password"),
						 'birth_date' => $request->get("birth_date"),	
						 'postal_code' => $request->get("postal_code"),
						 'street' => $request->get("street"),
						 'street_number' => $request->get("street_number"),
						 'neighborhood' => $request->get("neighborhood"),
						 'city' => $request->get("city"),
						 'state' => $request->get("state"),	 
						 'complement' => $request->get("complement"),
					   ]
		 ]);

		 try{

			Client::createNodeProperty("Client",$data);
		}
		catch(\GraphAware\Neo4j\Client\Exception\Neo4jException $e)){
			echo sprintf('Catched exception, message is "%s"', $e->getMessage());
		}
		 
		 
		
		return $data;	
	}

}
