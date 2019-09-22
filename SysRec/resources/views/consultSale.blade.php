@extends('layouts.app')
@section('conteudo')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>

<body class="animsition">
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<!-- eu tirei o layout de tabela -->
					@if(!empty($dataOrder))
					@foreach($dataOrder as $r)
							<!-- mostra o cabeçalho do pedido -->
							<div class="col-md-8">Numero do Pedido: {{$r->value('idOrder')}}</div> 
							<div class="col-md-8">Data do Pedido: {{$r->value('dateOrder')}} </div>
							<div class="col-md-8">Valor Total: {{$r->value('totalOrder')}} </div>
							
							<!-- botão com a ID concatenada com o numero do pedido, o ID deve ser unico, não pode se repetir -->
							<button id = "btn_detalhes_pedido_{{$r->value('idOrder')}}" onclick="exibir({{$r->value('idOrder')}})">Exibir Detalhes</button>
							
							<!-- esssa div mostrará os detalhes do pedido, ela inicia fechada dislay none -->
							<div id = "div_detalhes_pedido_{{$r->value('idOrder')}}" style = "display: none">
								<!-- trazer aqui os produtos do pedido -->
							</div>
							
							<!-- coloquei o script dentro do FOREACH, assim ele irá criar uma função para cada div e cada botão gerados pelo FOREACH-->
							<script>
								<!-- chamada padrão do JQuery pelo document.ready -->
								$(document).ready(function () {
									<!-- listener do botão com o ID do pedido, igual ao que está lá na tag BUTTON -->
									$("#btn_detalhes_pedido_{{$r->value('idOrder')}}").click(function () {
										<!-- o evento click tem um function dentro que fará o trabalho de mostrar ou esconder a div -->
										<!-- no estado atual capturo se a div está none ou block no momento do click -->
										estado_atual = $("#div_detalhes_pedido_{{$r->value('idOrder')}}").css("display");
										<!-- se estiver none troca pra block e vice versa -->
										if (estado_atual == "none") {
											novo_estado = "block";
										} else {
											novo_estado = "none";
										}
										<!-- atribui o novo display a div -->
										$("#div_detalhes_pedido_{{$r->value('idOrder')}}").css("display", novo_estado);
									});
								})
							</script>

						@endforeach
						@else
							Nâo existe Pedido
						@endif
				</div>
			</div>
		</div>
	</section>
</body>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	function exibir(id) {
		var idD = "#div_detalhes_pedido_" + id;
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