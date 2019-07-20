<?php
	if (!isAdmin())
	{
		return redirect('home');
	}
?>
@extends('layouts.app')
@section('conteudo')
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-b-30">	
				<h5 m-text26 p-b-36 p-t-15>Bem vindo a  Area Administrativa</h5>
				<ul>
					<li><a href="{{ route('logout') }}">Logout</a></li>
					<li><a href="{{ route('supplier') }}">Cadastrar Fornecedor</a></li>
					<li><a href="{{ route('category') }}">Cadastrar Categoria</a></li>
					<li><a href="{{ route('product') }}">Cadastrar Produto</a></li>
				</ul>
			</div>
		</div>
	<div>
</section>
@endsection