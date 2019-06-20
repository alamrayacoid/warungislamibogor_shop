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
                @for($i = 1 ; $i <= 12 ; $i++)
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box"> 
                            <div class="product-wishlist">
                                <button class="btn btn-circle btn-danger btn-lg btn-wishlist" type="button" title="Tambah ke wishlist"><i class="fa fa-heart"></i></button>
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
            $(this).find('i').toggleClass('fa far');
            $(this).toggleClass('btn-danger btn-default');
        })
    });
</script>
@endsection