@extends('frontpage.main-frontpage')



@section('content')

<section style="margin-top:8em">
    <div class="container">

        <form action="{{route('produk-frontpage')}}" method="get">
            <div class="ibox-content border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="nama_produk">Nama Produk</label>
                            <input type="text" id="nama_produk" name="nama_produk" value="" placeholder="Nama Produk"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="harga_min">Harga Minimal</label>
                            <input type="text" id="harga_min" name="harga_min" value="" placeholder="Minimal"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="harga_max">Harga Maksimal</label>
                            <input type="text" id="harga_max" name="harga_max" value="" placeholder="Maksimal"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="jenis">Jenis Produk</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="All">Semua</option>
                                @foreach($tipe as $row)
                                <option value="{{$row->ity_code}}">{{$row->ity_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="">
                </div>

            </div>
        </form>
        <div class="row mt-5">
            @foreach($data as $row)
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-content product-box">
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
                                    <button class="btn btn-xs btn-outline btn-primary">Info <i
                                            class="fa fa-long-arrow-right"></i> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach
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