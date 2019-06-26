@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">


</style>
@endsection

@section('content')

    
            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">


                                    <div class="product-images">

                                        <div>
                                            <a href="{{asset('assets/img/gallery/1.jpg')}}" data-gallery="">
                                                
                                                <img src="{{asset('assets/img/gallery/1s.png')}}">
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{asset('assets/img/gallery/2.jpg')}}" data-gallery="">
                                                
                                                <img src="{{asset('assets/img/gallery/2s.png')}}">
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{asset('assets/img/gallery/3.jpg')}}" data-gallery="">
                                                
                                                <img src="{{asset('assets/img/gallery/3s.png')}}">
                                            </a>
                                        </div>


                                    </div>

                                </div>
                                @foreach($data as $row)
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs">
                                        {{$row->i_name}}
                                    </h2>
                                    <small>{{$row->itp_tagtitle}}</small>
                                    <div class="m-t-md">
                                        <h2 class="product-main-price">Rp. {{$row->ipr_sunitprice}} <small class="text-muted">Termasuk Pajak</small> </h2>
                                    </div>

                                        <div class="product-qty">
                                            <label>Qty</label>
                                            <div class="group-product-qty">
                                                <input type="number" value="1" min="1" class="form-control" name="">
                                                <select class="form-control" name=""></select>
                                            </div>
                                        </div>
                                    <hr>

                                    <div class="small text-muted">
                                        {!! html_entity_decode($row->itp_description) !!}
                                    </div>
                                    <dl class="small m-t-md">
                                        <dt>Tag Keyword</dt>
                                        <dd>{{$row->itp_tagkeyword}}</dd>
                                        <dt>Category</dt>
                                        <dd>{{$row->ity_name}}</dd>
                                    </dl>
                                    <hr>

                                    <div>
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="ibox-footer">
                            <span class="pull-right">
                                Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                            </span>
                            The generated Lorem Ipsum is therefore always free
                        </div>
                    </div>

                </div>
            </div>

@endsection

@section('extra_script')
<script>
    $(document).ready(function(){


        $('.product-images').slick({
            autoplay:true,
            autoplaySpeed:5000,
            dots: true,
            centerMode: true,
            infinite: true,
            variableWidth: true
        });

    });

</script>
@endsection