@foreach($produk as $row)
<input type="text" value="{{$row->ipr_sunitprice * $row->cart_qty}}" class="subtotalnow" hidden>
@endforeach