@extends('layouts.app')
@section('conteudo')
<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<form id="formfield" class="leave-comment" method="POST" enctype="multipart/form-data">
					@csrf
						<h4 class="m-text26 p-b-36 p-t-15">
							Edição de Produto
						</h4>

						<!-- Products -->
						<p>Selecione o produto que deseja alterar</p>
						<div class="bo4 of-hidden size15 m-b-20">
							<select  class="sizefull s-text7 p-l-22 p-r-22" name='product_id' id ="product">
								<option value="" selected disabled hidden>Selecione uma categoria</option>
								<?php echo $strProduct."\n" ?>                              
							</select>
						</div>

						<!-- Submit Button -->		
						<div class="w-size25">
							<input class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="button" name="btn" value="Editar" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-default" />
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection