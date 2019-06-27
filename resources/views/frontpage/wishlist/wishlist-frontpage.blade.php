@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">

</style>
@endsection

@section('content')
            <div class="ibox">

                <div class="ibox-title">
                    <h5><i class="fa fa-heart text-danger"></i> Wishlist</h5>
                </div>
                <div class="ibox-content">
                        <label>Cari Di Wishlist</label>
                        <div class="input-group">
                            <input placeholder="Cari Produk" type="text" name="" id="filter-wishlist" class="form-control input-sm">
                            <span class="input-group-btn">
                                <button class="btn btn-danger btn-sm hidden" type="button" id="btn-hapus"><i class="fa fa-times"></i></button>
                                <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i> <span>Cari</span></button>
                            </span>
                        </div>
                </div>
                
            </div>

            <div class="row">
                <div class="row mt-5">
                        @foreach($data as $row)
                        <div class="col-md-3">
                            <div class="ibox">
                                <div class="ibox-content product-box">
                                    @foreach($wish as $wis)
                                    @if($wis->wl_cmember == Auth::user()->cm_code && $wis->wl_ciproduct == $row->i_code)
                                    <div class="product-wishlist onproduk-page onwishlist">
                                        <button data-ciproduct="{{$wis->wl_ciproduct}}" data-member="{{Auth::user()->cm_code}}" class="btn btn-circle btn-lg btn-danger btn-wishlist" type="button" title="Tambah ke wishlist"><i class="fa-heart fa"></i></button>
                                    </div>
                                    @endif
                                    @endforeach
                                    @if($wish == '[]')
                                    <div class="product-wishlist onproduk-page">
                                        <button data-ciproduct="{{$row->i_code}}" class="btn btn-circle btn-lg btn-wishlist" id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i class="far fa-heart"></i></button>
                                    </div>
                                    @endif
                                        @foreach($gambar as $roww)
                                        @if($row->i_code == $roww->ip_ciproduct)
                                    <div class="product-imitations">
                                        <img src="/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}">
                                    </div>
                                    @endif
                                        @endforeach
                                    <div class="product-desc">
                                        <span class="product-price">
                                            Rp. {{$row->ipr_sunitprice}}
                                        </span>
                                        <small class="text-muted">{{$row->ity_name}}</small>
                                        <a href="#" class="product-name"> {{$row->i_name}}</a>



                                        <div class="small m-t-xs">
                                            {{$row->itp_tagdesc}}
                                        </div>
                                        <div class="m-t text-right">
                                            <form action="{{route('produk-detail-frontpage')}}" method="GET">
                                                <input type="hidden" name="code" value="{{$row->i_code}}">
                                            <button  class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforeach
                    </div>

            </div>

@endsection
@section('extra_script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#ncart').html($('.ncart').length);

        $('#btn-hapus').click(function(){
            $('#filter-wishlist').val('');
            $(this).addClass('hidden');
            $('#filter-wishlist').focus();
        })

        $('#filter-wishlist').on('keyup', function(){
            if($(this).val().length != 0){
                $('#btn-hapus').removeClass('hidden');
            }
        })

        $('.btn-wishlist').click(function(){
            var code = $(this).data('ciproduct');
            var member = $(this).data('wl_cmember');
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
            $.ajax({
                url : '{{route("addwishlist")}}',
                method : 'POST',
                data : {
                    '_token' : '{{csrf_token()}}',
                    'code' : code,
                    'member' : member,
                },

            })
        })
    });
</script>
@endsection