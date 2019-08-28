@extends('frontpage.main-frontpage')
@section('content')
<style>
.pagination{
    float:right;
    margin:2em 15px 1em 15px;
}
</style>
<section style="margin-top:5em">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li><a href="#">Pencarian</a></li>
        <li class="active">{{$namabarang}}</li>
    </ol>
    <div class="row header-search-filter-group">
        <div class="col-md-6">

            <div class="text-header-filter">
                Hasil Pencarian Anda <span>"{{$namabarang}}"</span>
            </div>

        </div>
        <div class="col-md-6 column-opsi-filter-group">
            <button class="btn-filter-opsi"><i class="fa fa-th" aria-hidden="true"></i></button>
            <button class="btn-filter-opsi"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
            <span>Urutkan<span>
                    <Select class="select-opsi-filter">
                        <option>Terbaru</option>
                        <option>Termurah</option>
                        <option>Termahal</option>
                        <option>Paling Banyak Dibeli</option>
                    </select>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4 col-md-3 col-lg-2">
                <h5 class="entry-v-nav__heading pt-5">Cari Lebih Detail</h5>
                <div class="product-filter-field-group">
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
                        <h5 class="entry-v-nav__heading">Nama Produk</h5>
                        <div class="form-group">
                            <input type="text" id="nama_produk" name="nama_produk" value="" placeholder="Nama Produk"
                                class="form-control">
                        </div>
                    </div>
                    <div class="product-filter-field-group">
                        <h5 class="entry-v-nav__heading">Jenis Produk</h5>
                        <div class="form-group">
                            <select name="jenis" id="jenis" class="form-control select2">
                                <option value="All">Semua</option>
                                @foreach($tipe as $row)
                                <option value="{{$row->ity_code}}">{{$row->ity_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="product-filter-field-group">
                        <h5 class="entry-v-nav__heading">Rentang Harga</h5>
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
                </form>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10 column-product-filter">
                <h5 class="header-product-item-filter">Produk Warung Islami Bogor</h5>
                <div class="row">
                    @if($data != '[]')
                    @foreach($data as $row)
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 column-product-item">
                        <div class="thumbnail product-box-item">
                            <div class="product-box">
                                @foreach($wish as $wis)
                                @if(Auth::check())
                                @if($wis->wl_cmember == Auth::user()->cm_code && $wis->wl_ciproduct == $row->i_code)
                                <div class="product-wishlist onproduk-page onwishlist">
                                    <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}"
                                        type="button" title="Tambah ke wishlist"><i class="fa-heart fa"></i></button>
                                </div>
                                @else
                                <div class="product-wishlist onproduk-page">
                                    <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}"
                                        id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i
                                            class="far fa-heart"></i></button>
                                </div>
                                @endif
                                @else
                                <div class="product-wishlist onproduk-page">
                                    <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}"
                                        id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i
                                            class="far fa-heart"></i></button>
                                </div>
                                @endif
                                @endforeach
                                @if($wish == '[]')
                                <div class="product-wishlist onproduk-page">
                                    <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}"
                                        id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i
                                            class="far fa-heart"></i></button>
                                </div>
                                @endif
                                @foreach($gambar as $roww)
                                @if($row->i_code == $roww->ip_ciproduct)
                                <div class="image-product-box"
                                    style="background:url('/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}')">
                                    <!-- <img src="/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}"> -->
                                </div>
                                @endif
                                @endforeach
                                <div class="caption">
                                    <div class="title-product-group">
                                        <a href="{{route('produk-detail-frontpage')}}?code={{$row->i_code}}"
                                            class="title-product-item">{{$row->i_name}}</a>
                                    </div>
                                    <div class="footer-product-item">
                                        <div class="">
                                            <i class="fa fa-star f-14 c-gold"></i>
                                            <i class="fa fa-star c-gold"></i>
                                            <i class="fa fa-star c-gold"></i>
                                            <i class="fa fa-star c-gold"></i>
                                            <i class="fa fa-star c-grey"></i>
                                        </div>
                                        <div class="price-product-item">Rp. {{$row->ipr_sunitprice}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--  -->
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

        $('.btn-wishlist').click(function () {
            var code = $(this).data('ciproduct');
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
            $.ajax({
                url: '{{route("addwishlist")}}',
                method: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'code': code,
                },

            })
        })

    });
</script>
@endsection