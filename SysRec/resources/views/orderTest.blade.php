@foreach ($data as $r)
<tr>
    <td>
        <div class="cart-img-product b-rad-4 o-f-hidden">
            <img src="{{ $r->value('file') }}" alt="IMG-PRODUCT">
        </div>
    </td>
    <td>{{ $r->value('name')}}</td>
    <td>{{ $r->value('price')}}</td>
</tr>
@endforeach