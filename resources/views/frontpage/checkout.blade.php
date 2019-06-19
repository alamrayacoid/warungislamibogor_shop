@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    .shoping-cart-table input{
        min-width: 50px;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-9">

        <div class="ibox">
            <div class="ibox-title">
                <h5>Alamat</h5>
            </div>

            <div class="ibox-content">

                <div class="table-responsive">

                    <table class="table table-cart">

                        <tbody>
                            <tr>
                                <td width="30%"><b>Provinsi</b></td>
                                <td>Jawa Timur</td>
                            </tr>
                            <tr>
                                <td><b>Kabupaten/Kota</b></td>
                                <td>Surabaya</td>
                            </tr>
                            <tr>
                                <td><b>Kecamatan</b></td>
                                <td>Wonokromo</td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td>Jl. Ngagel Dadi 1 no.32</td>
                            </tr>
                        </tbody>
                        
                    </table>
                    
                </div>

            </div>

            <div class="ibox-footer text-right">
                <button class="btn btn-warning btn-sm" type="button"><i class="fa fa-pencil-alt"></i> Ubah Alamat</button>
            </div>
            
        </div>

        <div class="ibox">
            <div class="ibox-title">
                <span class="pull-right">(<strong>5</strong>) items</span>
                <h5>Items in your cart</h5>
            </div>
            <div class="ibox-content">


                <div class="table-responsive">
                    <table class="table shoping-cart-table">

                        <tbody>
                        <tr>
                            <td width="90">
                                <img src="{{asset('assets/img/gallery/1s.jpg')}}" width="100px">
                            </td>
                            <td class="desc">
                                <h3>
                                <a href="#" class="text-navy">
                                    Desktop publishing software
                                </a>
                                </h3>
                                <p class="small">
                                    It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is
                                </p>
                                <dl class="small m-b-none">
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                </dl>

                            </td>

                            <td>
                                $180,00
                                
                            </td>
                            <td width="65">
                                <input type="text" class="form-control" placeholder="1">
                            </td>
                            <td>
                                <h4>
                                    $180,00
                                </h4>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">

                        <tbody>
                        <tr>
                            <td width="90">
                                <img src="{{asset('assets/img/gallery/2s.jpg')}}" width="100px">
                            </td>
                            <td class="desc">
                                <h3>
                                    <a href="#" class="text-navy">
                                        Text editor
                                    </a>
                                </h3>
                                <p class="small">
                                    There are many variations of passages of Lorem Ipsum available
                                </p>
                                <dl class="small m-b-none">
                                    <dt>Description lists</dt>
                                    <dd>List is perfect for defining terms.</dd>
                                </dl>

                            </td>

                            <td>
                                $50,00
                                
                            </td>
                            <td width="65">
                                <input type="text" class="form-control" placeholder="2">
                            </td>
                            <td>
                                <h4>
                                    $100,00
                                </h4>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">

                        <tbody>
                        <tr>
                            <td width="90">
                                <img src="{{asset('assets/img/gallery/3s.jpg')}}" width="100px">
                            </td>
                            <td class="desc">
                                <h3>
                                    <a href="#" class="text-navy">
                                        CRM software
                                    </a>
                                </h3>
                                <p class="small">
                                    Distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is
                                </p>
                                <dl class="small m-b-none">
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                </dl>

                            </td>

                            <td>
                                $110,00
                            </td>
                            <td width="65">
                                <input type="text" class="form-control" placeholder="1">
                            </td>
                            <td>
                                <h4>
                                    $110,00
                                </h4>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">

                        <tbody>
                        <tr>
                            <td width="90">
                                <img src="{{asset('assets/img/gallery/4s.jpg')}}" width="100px">
                            </td>
                            <td class="desc">
                                <h3>
                                    <a href="#" class="text-navy">
                                        PM software
                                    </a>
                                </h3>
                                <p class="small">
                                    Readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                                </p>
                                <dl class="small m-b-none">
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                </dl>

                            </td>

                            <td>
                                $130,00
                            </td>
                            <td width="65">
                                <input type="text" class="form-control" placeholder="1">
                            </td>
                            <td>
                                <h4>
                                    $130,00
                                </h4>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">

                        <tbody>
                        <tr>
                            <td width="90">
                                <img src="{{asset('assets/img/gallery/5s.jpg')}}" width="100px">
                            </td>
                            <td class="desc">
                                <h3>
                                    <a href="#" class="text-navy">
                                        Photo editor
                                    </a>
                                </h3>
                                <p class="small">
                                    Page when looking at its layout. The point of using Lorem Ipsum is
                                </p>
                                <dl class="small m-b-none">
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                </dl>

                            </td>

                            <td>
                                $700,00
                            </td>
                            <td width="65">
                                <input type="text" class="form-control" placeholder="1">
                            </td>
                            <td>
                                <h4>
                                    $70,00
                                </h4>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="ibox-content text-right">

                <button class="btn btn-warning btn-sm"><i class="fa fa fa-money-bill-alt"></i> Bayar</button>

            </div>
        </div>

    </div>
    <div class="col-md-3">

        <div class="ibox">
            <div class="ibox-title">
                <h5>Cart Summary</h5>
            </div>
            <div class="ibox-content">
                <span>
                    Total
                </span>
                <h2 class="font-bold">
                    $390,00
                </h2>

                <hr/>
                <div class="m-t-sm">
                    <div class="btn-group">
                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-money-bill-alt"></i> Bayar</a>
                    <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="ibox">
            <div class="ibox-title">
                <h5>Support</h5>
            </div>
            <div class="ibox-content text-center">



                <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                <span class="small">
                    Please contact with us if you have any questions. We are avalible 24h.
                </span>


            </div>
        </div>

        <div class="ibox">
            <div class="ibox-content">

                <p class="font-bold">
                Other products you may be interested
                </p>

                <hr/>
                <div>
                    <a href="#" class="product-name"> Product 1</a>
                    <div class="small m-t-xs">
                        Many desktop publishing packages and web page editors now.
                    </div>
                    <div class="m-t text-righ">

                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
                <hr/>
                <div>
                    <a href="#" class="product-name"> Product 2</a>
                    <div class="small m-t-xs">
                        Many desktop publishing packages and web page editors now.
                    </div>
                    <div class="m-t text-righ">

                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection