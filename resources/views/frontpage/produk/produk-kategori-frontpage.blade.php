@extends('frontpage.main-frontpage')
@section('content')
<style>
    .pagination {
        float: right;
        margin: 2em 15px 1em 15px;
    }
    .btn-wishlist-frontpage{
        right: 25px;
    }
</style>
<section style="margin-top:4.5em">
    <ol class="breadcrumb breadcumb-header" style="margin-bottom: 0 !important;">
        <li><a href="#">Home</a></li>
        <li>Kategori Produk</li>
        <li class="active">{{$namakategori->ity_name}}</a></li>
    </ol>
    <section style="border-bottom: 1px solid #efeff4">
    <div class="container-fluid">
    <div class="row header-search-filter-group">
        <div class="col-md-6">
            <div class="text-header-filter">
                Kategori Produk {{$namakategori->ity_name}}
            </div>

        </div>
        <div class="col-md-6 column-opsi-filter-group">
                    <form action="{{route('produk-filter-frontpage')}}" method="get">
                    <input type="hidden" class="d-none" value="{{$namakategori->ity_code}}" name="kategori">
                    <span>Urutkan<span>&nbsp;
                    @if($statusfilter == null || $statusfilter == '')
                    <Select class="select-opsi-filter" name="status_filter"  id="filter-product-js">
                        <option value="terbaru">Terbaru</option>
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                    </select>
                    @else
                    <Select class="select-opsi-filter" name="status_filter"  id="filter-product-js">
                        <option value="terbaru" {{ ('terbaru' == $statusfilter) ? 'selected' : '' }}>Terbaru</option>
                        <option value="termurah" {{ ('termurah' == $statusfilter) ? 'selected' : '' }}>Termurah</option>
                        <option value="termahal" {{ ('termahal' == $statusfilter) ? 'selected' : '' }}>Termahal</option>
                    </select>
                    @endif
                    
                    <input type="submit" class="d-none" id="submit-filter-product" name="" hidden>
                </form>
        </div>
        </div>
    </div>
    </section>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4 col-md-3 col-lg-2 sidebar-filter-wrapper">
                <div class="header--filter-sidebar" data-toggle="collapse" data-target="#kategori">
                <h5 class="entry-v-nav__heading pt-5">Cari Lebih Detail</h5>
                <button type="button" class="btn btn-more-filter" style="position: relative;right: 5px;"><i class="fa fa-plus"></i></button>
                </div>
                <div class="product-filter-field-group collapse" id="kategori">
                    <h5 class="entry-v-nav__heading">Kategori</h5>
                    <ul>
                        @foreach($kategori as $row)
                        <li><a href="{{route('kategori-produk',['id'=> $row->ity_name ])}}"
                                style="color:#009a51 !important;">{{$row->ity_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <form action="{{route('produk-frontpage')}}" method="get">
                    <div class="product-filter-field-group">
                        <div class="header--filter-sidebar" data-toggle="collapse" data-target="#produk">
                            <h5 class="entry-v-nav__heading pt-5">Nama Produk</h5>
                            <button type="button" class="btn btn-more-filter"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="collapse" id="produk">
                        <div class="form-group">
                            <input type="text" id="nama_produk" name="nama_produk" value="" placeholder="Nama Produk"
                                class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="product-filter-field-group">
                        <div class="header--filter-sidebar" data-toggle="collapse" data-target="#jenisproduk">
                            <h5 class="entry-v-nav__heading pt-5">Jenis Produk</h5>
                            <button type="button" class="btn btn-more-filter"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="collapse" id="jenisproduk">
                        <div class="form-group">
                            <select name="jenis" id="jenis" class="form-control select2">
                                <option value="All">Semua</option>
                                @foreach($tipe as $row)
                                <option value="{{$row->ity_code}}">{{$row->ity_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="product-filter-field-group">
                        <div class="header--filter-sidebar" data-toggle="collapse" data-target="#hargaprodukfilter">
                            <h5 class="entry-v-nav__heading pt-5">Rentang Harga</h5>
                            <button type="button" class="btn btn-more-filter"><i class="fa fa-plus"></i></button>
                        </div>
                    <div class="collapse" id="hargaprodukfilter">
                        <div class="form-group">
                            <input type="text" id="harga_min" name="harga_min" value="" placeholder="Min"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" id="harga_max" name="harga_max" value="" placeholder="Max"
                                class="form-control">
                        </div>
                        <input type="submit" name="" class="btn-submit-filter-item" value="Cari Sekarang">
                    </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-8 col-md-9 col-lg-10 column-product-filter">
                <h5 class="header-product-item-filter">Produk Warung Islami Bogor</h5>
                <div class="row">
                    @if($test1 > 0)
                    @foreach($test as $row)
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 column-product-item">
                        <div class="thumbnail product-box-item">
                            <input type="hidden" value="{{$row->ipr_sunitprice}}" class="harga" name="">
                            <div class="product-box">
                            
                            @if(Auth::check())
                            @if($row->wl_ciproduct == null)
                            <button class="btn btn-wishlist-frontpage" type="button" data-ciproduct="{{$row->i_code}}"><i class="fa fa-heart"></i></button>
                            @else
                            <button class="btn btn-wishlist-frontpage" type="button" data-ciproduct="{{$row->i_code}}"><i class="fa fa-heart icon-onwishlist"></i></button>
                            @endif
                            @else
                            <a href="{{route('login-frontpage')}}"><button class="btn btn-wishlist-frontpage" type="button"><i class="fa fa-heart"></i></button></a>
                            @endif
                                @foreach($gambar as $roww)
                                @if($row->i_code == $roww->ip_ciproduct)
                                <div class="image-product-box"
                                    style="background:url('env('APP_WIB')}}storage/image/master/produk/{{$roww->ip_path}}')">
                                </div>
                                @endif
                                @endforeach
                                @if($row->ip_path == null)
                                <div class="image-product-box"
                                      style="background:url('{{asset('assets/img/noimage.jpg')}}')"
                                        alt="Sorry! Image not available at this time">
                                </div>
                                @endif
                                <div class="caption">
                                    <div class="title-product-group">
                                        <a href="{{url('product',$row->i_link)}}"
                                            class="title-product-item">{{$row->i_name}}</a>
                                    </div>
                                    @if($row->gpp_sellprice == null)
                                    <div class="discount-product-item">
                                        
                                    </div>
                                    @else
                                    <div class="discount-product-item">
                                        <span class="discount-value">{{number_format(($row->ipr_sunitprice - $row->gpp_sellprice) / ($row->ipr_sunitprice / 100))}}%</span><span class="discount-price"> Rp. {{$row->ipr_sunitprice}}</span>
                                    </div>
                                    @endif
                                <div class="footer-product-item">
                                    @if($row->gpp_sellprice == null)
                                    <div class="price-product-item">
                                        Rp. {{$row->ipr_sunitprice}}
                                    </div>
                                    @else
                                    <div class="price-product-item">
                                        Rp. {{$row->gpp_sellprice}}
                                    </div>
                                    @endif
                                    <div class="">
                                        <i class="fa fa-tag" style="color: #009a51;"></i>&ensp;<span style="color: #595959;">{{$row->ity_name}}</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-12" style="margin-bottom: 3em;">
                        {{$test->appends(request()->input())->Links()}}
                    </div>
                    @else
                    <div class="column-empty-transaction">
                        <img src="{{asset('assets/img/img-product/empty-transaction.png')}}">
                        <h5>Oops, Produk Yang Anda Cari Tidak Ada.</h5>
                        <div class="d-flex justify-content-center">
                            <a href="{{url('/')}}"><button>Cari Produk Sekarang</button></a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
</section>
@endsection
@section('extra_script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#ncart').html($('.ncart').length);

        $('.btn-wishlist-frontpage').click(function () {
            
            var code = $(this).data('ciproduct');
            $(this).find('i').toggleClass('icon-onwishlist');
               var code = $(this).data('ciproduct');
                $.ajax({
                    url: '{{route("addwishlist")}}',
                    method: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'code': code,
                    },

                })
        });
        $('#filter-product-js').change(function(){
            $('#submit-filter-product').click();
        });
        // $('.column-product-item').each(function(){
        // var diskon = $(this).find('.discount-percent-val').val();
        // var harga = $(this).find('.harga').val();
        // var diskontotal = harga * diskon / 100;
        // var hargareal = harga - diskontotal;
        // $('.price-product-item').text(harga);
        // })

    });
    $('.header--filter-sidebar').click(function(){
        $(this).find('i').toggleClass('fa-minus');
    })
        
</script>
@endsection