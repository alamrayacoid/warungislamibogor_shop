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
                        @for($i = 1 ; $i <= 12 ; $i++)
                        <div class="col-md-3">
                            <div class="ibox">
                                <div class="ibox-content product-box">
                                    <div class="product-wishlist onproduk-page">
                                        <button class="btn btn-circle btn-lg btn-wishlist" type="button" title="Tambah ke wishlist"><i class="far fa-heart"></i></button>
                                    </div>
                                    <div class="product-imitations">
                                        <img src="{{asset('assets/img/gallery/'.$i.'.jpg')}}">
                                    </div>
                                    <div class="product-desc">
                                        <span class="product-price">
                                            Rp. 10.000
                                        </span>
                                        <small class="text-muted">Category</small>
                                        <a href="#" class="product-name"> Product</a>



                                        <div class="small m-t-xs">
                                            Many desktop publishing packages and web page editors now.
                                        </div>
                                        <div class="m-t text-right">

                                            <a href="{{route('produk-detail-frontpage')}}" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endfor
                    </div>
                
        </div>
    </div>
    
@endsection
@section('extra_script')
<script>
    $(document).ready(function(){
         $(".variable").slick({
            autoplay:true,
            autoplaySpeed:5000,
            dots: true,
            infinite: true,
            variableWidth: true
        });

        $('.btn-wishlist').click(function(){
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
        })
    });    
</script>
@endsection