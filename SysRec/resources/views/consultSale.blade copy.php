@extends('layouts.app')
@section('conteudo')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body class="animsition">
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">Numero do Pedido</th>
							<th class="column-2">Data do Pedido</th>
							<th class="column-3">Valor Total</th>
						</tr>
						@if(!empty($dataOrder))
						@foreach($dataOrder as $r)
						<tr class="table-row">
							<td class="column-1">{{$r->value('idOrder')}}</td>
							<td class="column-2">{{$r->value('dateOrder')}}</td>
							<td class="column-3">{{$r->value('totalOrder')}}</td>
							<td class="column-4"><button onclick="exibir({{$r->value('idOrder')}});" id='idOrder'>Exibir Detalhes</button></td>
						</tr>
						<tr class="table-row" id="exibir_{{$r->value('idOrder')}}">
							
						</tr>

						@endforeach
						@else
						<tr class="table-row" align="center">
							<td class="column-1" colspan="4">Nâo existe Pedido</td>
						</tr>
						@endif
					</table>
				</div>
			</div>
		</div>
	</section>
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	function exibir(id) {
		var idD = "#exibir_" + id;
		var url = "/consultaAjax/" + id;
		$.ajax({
				url: url,
				type: 'GET',
				data: {
					nome: id
				}
			})
			.done(function(msg) {
				$(idD).append(msg);
			});

	}
</script>
@endsection