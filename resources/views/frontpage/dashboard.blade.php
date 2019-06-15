@extends('frontpage.main-frontpage')
@section('extra_style')
<style type="text/css">

</style>
@endsection
@section('content')
    
    <div class="row dashboard-frontpage">
        <div class="col-lg-3 col-md-4 col-sm-5">
            <div class="ibox">

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
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7" id="dashboard-content">
            
                    <div class="carousel slide" id="carousel2">
                        <ol class="carousel-indicators">
                            <li data-slide-to="0" data-target="#carousel2"  class="active"></li>
                            <li data-slide-to="1" data-target="#carousel2"></li>
                            <li data-slide-to="2" data-target="#carousel2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="image"  class="img-responsive" src="{{asset('assets/img/p_big1.jpg')}}">
                                <div class="carousel-caption">
                                    <p>This is simple caption 1</p>
                                </div>
                            </div>
                            <div class="item ">
                                <img alt="image"  class="img-responsive" src="{{asset('assets/img/p_big3.jpg')}}">
                                <div class="carousel-caption">
                                    <p>This is simple caption 2</p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="image"  class="img-responsive" src="{{asset('assets/img/p_big2.jpg')}}">
                                <div class="carousel-caption">
                                    <p>This is simple caption 3</p>
                                </div>
                            </div>
                        </div>
                        <a data-slide="prev" href="#carousel2" class="left carousel-control">
                            <span class="icon-prev"></span>
                        </a>
                        <a data-slide="next" href="#carousel2" class="right carousel-control">
                            <span class="icon-next"></span>
                        </a>
                    </div>

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
                                        <div class="m-t text-righ">

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

        $('.btn-wishlist').click(function(){
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
        })
    });    
</script>
@endsection