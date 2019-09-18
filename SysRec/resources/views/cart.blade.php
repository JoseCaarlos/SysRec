@extends('layouts.app')
@section('conteudo')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
	<div class="sec-title p-b-60">
		<h3 class="m-text5 t-center">
			Related Products
		</h3>
	</div>
	<div class="container">
		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
				@if(!empty($dataRel))
				@foreach($dataRel as $r)
				<div class="item-slick2 p-l-15 p-r-15">
					<div class="block2">
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
							<img src="{{ $r->value('file') }}" alt="IMG-PRODUCT">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>

								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<a href="{{ route ('cartId', $r->value('id')) }}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Add to Cart
									</a>
								</div>
							</div>
						</div>

						<div class="block2-txt p-t-20">
							<a href="{{route ('produtoDetalhe', $r->value('id')) }}" class="block2-name dis-block s-text3 p-b-5">
								{{ $r->value('name') }}
							</a>

							<span class="block2-price m-text6 p-r-5">
								R$ {{ $r->value('price') }}
							</span>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">
				<table class="table-shopping-cart">
					<tr class="table-head">
						<th class="column-1"></th>
						<th class="column-2">Produtos</th>
						<th class="column-3">Preços</th>
						<th class="column-4 p-l-70">Quantidade</th>
						<th class="column-5">Total</th>
					</tr>
					@if(!empty($data))
					@foreach($data as $r)
					<tr class="table-row">
						<td class="column-1">
							<div class="cart-img-product b-rad-4 o-f-hidden">
								<img src="{{ $r->value('file') }}" alt="IMG-PRODUCT">
							</div>
						</td>
						<td class="column-2">{{ $r->value('name') }}</td>
						<td class="column-3"><input style="background-color:transparent;" name="precoUni" type="number" disabled value="{{$r->value('price')}}"></td>
						<td class="column-4" align="center">
							<div class="flex-w bo5 of-hidden w-size17">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" id="qtd" type="number" name="num-product1" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>
							<a href="{{route ('cartExcluir', $r->value('idOrder')) }}">Excluir</a>
						</td>
						<td class="column-5"><input style="background-color:transparent;" type="number" class="totProd" id="totProod" disabled value=""></td>
					</tr>
					@endforeach
					@else
					<tr class="table-row">
						<td colspan="5" align="center">
							Não existe produtos
						</td>
					</tr>
					@endif
				</table>
			</div>
		</div>

		<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
			<div class="flex-w flex-m w-full-sm">
				<div class="size11 bo4 m-r-10">
					<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
				</div>

				<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Apply coupon
					</button>
				</div>
			</div>

			<div class="size10 trans-0-4 m-t-10 m-b-10">
				<!-- Button -->
				<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
					Update Cart
				</button>
			</div>
		</div>

		<!-- Total -->
		<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
			<h5 class="m-text20 p-b-24">
				Cart Totals
			</h5>

			<!--  -->
			<div class="flex-w flex-sb-m p-b-12">
				<span class="s-text18 w-size19 w-full-sm">
					Subtotal:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					<input style="background-color:transparent;" id="subTot" type="number" disabled value="">
				</span>
			</div>

			<!--  -->
			<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
				<span class="s-text18 w-size19 w-full-sm">
					Shipping:
				</span>

				<div class="w-size20 w-full-sm">
					<p class="s-text8 p-b-23">
						There are no shipping methods available. Please double check your address, or contact us if you need any help.
					</p>

					<span class="s-text19">
						Calculate Shipping
					</span>

					<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
						<select class="selection-2" name="country">
							<option>Select a country...</option>
							<option>US</option>
							<option>UK</option>
							<option>Japan</option>
						</select>
					</div>

					<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
					</div>

					<div class="size13 bo4 m-b-22">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
					</div>

					<div class="size14 trans-0-4 m-b-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Update Totals
						</button>
					</div>
				</div>
			</div>

			<!--  -->
			<div class="flex-w flex-sb-m p-t-26 p-b-30">
				<span class="m-text22 w-size19 w-full-sm">
					Total:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					$39.00
				</span>
			</div>

			<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
				<!-- Button -->
				<a href="{{route ('finalizar', ) }}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
					Finalizar
				</a>
			</div>
		</div>
	</div>
</section>
<script>

	var sumP = 0;
	var p = 0;
	var q = 0;
	$(".table-row").each(function () {
            if (true) {
				q = $(this).find('input[name=num-product1]').val();
				p = $(this).find('input[name=precoUni]').val();
				sumP = parseFloat(q) * parseFloat(p);
			}
			$(".totProd").val(sumP);
	});
	


	var sum = 0;
	$(".totProd").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseFloat(this.value);
            }
		})
	$("#subTot").val(sum);
</script>
@endsection