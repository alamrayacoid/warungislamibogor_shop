@extends('frontpage.main-frontpage')



@section('content')
    



            <div class="ibox-content border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="nama_produk">Nama Produk</label>
                            <input type="text" id="nama_produk" name="nama_produk" value="" placeholder="Nama Produk" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="harga_min">Harga Minimal</label>
                            <input type="text" id="harga_min" name="harga_min" value="" placeholder="Minimal" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="harga_max">Harga Maksimal</label>
                            <input type="text" id="harga_max" name="harga_max" value="" placeholder="Maksimal" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="jenis">Jenis Produk</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="All">Semua</option>
                                <option value="1">Botol</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-3">
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

@endsection
@section('extra_script')
<script type="text/javascript">
    $(document).ready(function(){

        $('.btn-wishlist').click(function(){
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
        })
    });
</script>
@endsection