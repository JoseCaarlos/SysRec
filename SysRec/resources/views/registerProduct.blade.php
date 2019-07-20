@extends('layouts.app')
@section('conteudo')

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
							<p> Dados Do Produto</p>
							<br>
                        
							<!-- Nome -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Nome">
                            </div>

							<!-- Category -->
							<div class="bo4 of-hidden size15 m-b-20">
								<select  class="sizefull s-text7 p-l-22 p-r-22" name='category_id'>
									<?php echo $strCat."\n" ?>                              
								</select>
							</div>

                            <!-- Supllier -->
							<div class="bo4 of-hidden size15 m-b-20">
								<select  class="sizefull s-text7 p-l-22 p-r-22" name='supplier_id'>
									<?php echo $strSup."\n" ?>                              
								</select>
							<div class="bo4 of-hidden size15 m-b-20">
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
    @endsection
    