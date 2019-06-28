@extends('frontpage.main-frontpage')
@section('extra_style')
<style type="text/css">

</style>
@endsection
@section('content')
    
    <div class="row dashboard-frontpage">
        {{-- <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox">

                <div class="ibox-content ">
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                            
                                <img alt="image" class="img-responsive" src="{{asset('assets/img/profile_big.jpg')}}">
                            
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <h4 class="pt-4"><strong>Nama Customer</strong></h4>
                            <ul class="ibox-list-pembelian">
                                <li><a href="{{route('pembelian-pembayaran-frontpage' , ['status' => 2])}}"><span>Pembayaran</span> <label class="label label-info">0</label></a></li>
                                <li><a href="{{route('pembelian-diproses-frontpage' , ['status' => 3])}}"><span>Sedang di Proses</span> <label class="label label-info">0</label></a></li>
                                <li><a href="{{route('pembelian-dikirim-frontpage' , ['status' => 4])}}"><span>Proses Pengiriman</span> <label class="label label-info">0</label></a></li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="ibox-content p-3">
                    <div class="ibox-profile">
                        <img src="{{asset('assets/img/profile_small.jpg')}}" height="48px" width="48px">
                        <span>Nama Customer</span>
                    </div>

                    <ul class="ibox-list-pembelian">
                        <li><a href="{{route('pembelian-pembayaran-frontpage' , ['status' => 2])}}"><span>Pembayaran</span> <label class="label label-info">0</label></a></li>
                        <li><a href="{{route('pembelian-diproses-frontpage' , ['status' => 3])}}"><span>Sedang di Proses</span> <label class="label label-info">0</label></a></li>
                        <li><a href="{{route('pembelian-dikirim-frontpage' , ['status' => 4])}}"><span>Proses Pengiriman</span> <label class="label label-info">0</label></a></li>
                    </ul>
                </div>
                
            </div>
        </div> --}}
        <div class="col-lg-12 col-md-12 col-sm-12" id="dashboard-content">
            

                    <section class="variable slider">

                        <div>
                            <img alt="image"  class="img-responsive" src="{{asset('assets/img/p_big1.jpg')}}">

                        </div>
                        <div>
                            <img alt="image"  class="img-responsive" src="{{asset('assets/img/p_big3.jpg')}}">

                        </div>
                        <div>
                            <img alt="image"  class="img-responsive" src="{{asset('assets/img/p_big2.jpg')}}">

                        </div>
                        
                    </section>
                    
                    <div class="row mt-5">
                        @foreach($data as $row)
                        <div class="col-md-3">
                            <div class="ibox">
                                <div class="ibox-content product-box">
                                    @foreach($wish as $wis)
                                    @if(Auth::check())
                                        @if($wis->wl_cmember == Auth::user()->cm_code && $wis->wl_ciproduct == $row->i_code)
                                        <div class="product-wishlist onproduk-page onwishlist">
                                            <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i class="fa-heart fa"></i></button>
                                        </div>
                                        @else
                                        <div class="product-wishlist onproduk-page">
                                            <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}" id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        @endif
                                    @else
                                    <div class="product-wishlist onproduk-page">
                                        <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}" id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i class="far fa-heart"></i></button>
                                    </div>
                                    @endif
                                    @endforeach
                                    @if($wish == '[]')
                                    <div class="product-wishlist onproduk-page">
                                        <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}" id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i class="far fa-heart"></i></button>
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
    </div>
    
@endsection
@section('extra_script')
<script>
    $(document).ready(function(){

        $('#ncart').html($('.ncart').length);

         $(".variable").slick({
            autoplay:true,
            autoplaySpeed:5000,
            dots: true,
            centerMode: true,
            infinite: true,
            variableWidth: true
        });

        $('.btn-wishlist').click(function(){
            var code = $(this).data('ciproduct');
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
            $.ajax({
                url : '{{route("addwishlist")}}',
                method : 'POST',
                data : {
                    '_token' : '{{csrf_token()}}',
                    'code' : code,
                },

            })
        })
    });    
</script>
@endsection