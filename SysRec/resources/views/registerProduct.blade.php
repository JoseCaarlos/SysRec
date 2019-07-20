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
						<form id="register_form" class="leave-comment" method="POST" action="{{ route('categoryRegister') }}">
						@csrf
							<h4 class="m-text26 p-b-36 p-t-15">
								Registro de Produto
							</h4>
							<p> Dados Do Produto
							<br>
                        
							<!-- Nome -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Nome">
                            </div>
                            <!-- Category -->
                            <?php
    
                       // colocar picklist
                           
                             var_dump($data);
                                 
                                
                              
           				    ?>
							<div class="w-size25">
								<!-- Button -->
								<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
									Registrar Categoria
								</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
    @endsection
    
    'infos' => [ 'category_id' => $request->get("category_id"),
    'supplier_id' => $request->get("supplier_id"),
    'name' => $request->get("name"),
    'price' => $request->get("price"),
    'describ' => $request->get("describ"),
    'height' => $request->get("height"),
    'width' => $request->get("width"),
    'depth' => $request->get("depth"),	 
    'weight' => $request->get("weight"),
    'sac' => $request->get("sac")
  ]