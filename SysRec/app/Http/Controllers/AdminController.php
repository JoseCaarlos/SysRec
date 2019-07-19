<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
		if (!isAdmin())
		{	
			return view('admin');
		}
		else 
		{
			return view('adminPanel');
		}
	}

	public function autenticar(Request $request)
	{

		$u = $request->input("username");
		$p = $request->input("password");
		$auth = new Admin();


		if($auth->autenticar($u, $p) OR isAdmin() == true)
		{
			$request->session()->put('admin', true);
			return view('adminPanel');
		}
		else 
			return view('admin');

	}

	public function logout()
	{
		session()->forget('admin');
		return redirect()->route('home');
	}
}