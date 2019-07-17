@extends('layouts.app')
@section('conteudo')
<body class="animsition">

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<form class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Login
						</h4>
						<h6 class="m-text12 p-b-36 p-t-15">Entre e tenha uma nova experiência de consumo!</h6>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="name" placeholder="E-mail">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Senha">
						</div>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Entrar
							</button>

						</div>

						<h6 class="m-text12 p-b-36 p-t-15">
							<a href="{{ route('register') }}">Ainda não possui uma conta? Cadastre-se agora!</a>
						</h6>

					</form>
				</div>
			</div>
		</div>
	</section>


</body>
@endsection