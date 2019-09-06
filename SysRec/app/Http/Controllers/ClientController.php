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
		$cpf = $request->get("cpf");

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

		//  try{

		// 	Client::createNodeProperty("Client",$data);
		// }
		// catch(\GraphAware\Neo4j\Client\Exception\Neo4jException $e)){
		// 	echo sprintf('Catched exception, message is "%s"', $e->getMessage());
		// }

		$success = "";
		$error = "";

		if(Client::verificarCpf($cpf)){
			$error = true;
			return view('register', compact('error','data'));
		}
		else
		{
			Client::createNodeProperty("Client", $data);
			$success = true;		
			return view('register', compact('success'));
		}

	}
	
	public function autenticar(Request $request)
	{

		$u = $request->input("name");
		$p = $request->input("password");
		$auth = new Client();


		if($auth->autenticar($u, $p) OR isClient() == true)
		{
			$dados = Client::dados($u,$p);
			$r = $dados->getRecord();
			/* Carrega Sessão Cliente e E-mail */
			$nome = $r->value('name');
			if(isset($u))
			{
				$request->session()->put('client', true);
				$request->session()->put('email', $u);
				$request->session()->put('name', $r->value('name'));
			}			
			return redirect('/produtos');
		}
		else 
		{
			$alert = "";
			$alert = true;
			return view('client', compact('alert'));
		}
			

	}


}
