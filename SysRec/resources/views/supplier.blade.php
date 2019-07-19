@extends('layouts.app')
@section('conteudo')

	<body class="animsition">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/client-register.js') }}"></script>
	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 p-b-30">
						<form id="register_form" class="leave-comment" method="POST" action="{{ route('supplierRegister') }}">
						@csrf
							<h4 class="m-text26 p-b-36 p-t-15">
								Registro de Fornecedor
							</h4>
							<p>Dados do Fornecedor</p> 
							<br>

							<!-- Nome -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Nome">
							</div>
           				   <!-- CNPJ -->
              				<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cnpj" placeholder="CNPJ">
							</div>

							<!-- Telefone Celular -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone_number" placeholder="Telefone Celular">
							</div>
							
							<!-- Telefone -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="telephone" placeholder="Telefone Residencial">
							</div>

							<!-- E-Mail -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="E-mail">
              </div>
              

            	<p>Localização</p>

							<!-- CEP -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="postal_code" placeholder="CEP">
							</div>

							<!-- Rua -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="street" placeholder="Rua">
							</div>

							<!-- Número -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="street_number" placeholder="Número">
							</div>

							<!-- Bairro -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="neighborhood" placeholder="Bairro">
							</div>

							<!-- Cidade -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="city" placeholder="Cidade">
							</div>

							<!-- Estado -->
							<div class="bo4 of-hidden size15 m-b-20">
								<select class="sizefull s-text7 p-l-22 p-r-22" name="state">
									<option value="" selected disabled hidden>Escolha um estado</option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espírito Santo</option>
									<option value="GO">Goiás</option>
									<option value="MA">Maranhão</option>
									<option value="MT">Mato Grosso</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
								</select>
							</div>

							<!-- Complemento -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="complement" placeholder="Complemento">
							</div>

							<div class="w-size25">
								<!-- Button -->
								<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
									Registrar Forncedor
								</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
	@endsection