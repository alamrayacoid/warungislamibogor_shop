@extends('frontpage.main-frontpage')
@section('extra_style')
<style type="text/css">

</style>
@endsection
@section('content')
    
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Detail Profil</h5>
                </div>
                <div>
                    <div class="ibox-content" align="center">
                        <img alt="image" class="img-responsive rounded" src="{{asset('assets/img/a3.jpg')}}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>Monica Smith</strong></h4>
                        <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                        <p><i class="fa fa-envelope"></i> email@domain.com</p>
                        <p><i class="fa fa-phone"></i> +62851122334455</p>
                        <div class="row m-t-lg">
                            <div class="col-md-6">
                                
                                <h5><i class="fa fa-star"></i> <strong>169</strong> Wishlist</h5>
                            </div>
                            <div class="col-md-6">
                                
                                <h5><i class="fa fa-shopping-cart"></i> <strong>28</strong> Transaksi</h5>
                            </div>
                            {{-- <div class="col-md-4">
                                
                                <h5><strong>240</strong> Followers</h5>
                            </div> --}}
                        </div>
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-warning btn-sm btn-block"><i class="fa fa-pencil-alt"></i> Ubah Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
            </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Profil</h5>
                    <div class="ibox-tools">
                        <a href="#" title="Ubah Profile">
                            <i class="fa fa-wrench"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Nama</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="">
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>E-mail</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="">
                            </div>
                        </div>

                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>No. Handphone</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="">
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Provinsi</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <select class="form-control input-sm select2" name="">
                                    <option value="">~ Pilih Provinsi ~</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Kabupaten/Kota</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <select class="form-control input-sm select2" name="">
                                    <option value="">~ Pilih Kabupaten/Kota ~</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Kecamatan</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <select class="form-control input-sm select2" name="">
                                    <option value="">~ Pilih Kecamatan ~</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Alamat</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <textarea class="form-control" name=""></textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <label class="mr-5"><input type="radio" name="gender" value="L"> Laki-laki</label>
                                <label><input type="radio" name="gender" value="P"> Perempuan</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Bank</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <select class="form-control input-sm" name="">
                                    <option value="">~ Pilih Bank ~</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>No. Rekening</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control  input-sm" name="">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Password</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <input type="password" class="form-control  input-sm" name="">
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Password Konfirm</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <input type="password" class="form-control  input-sm" name="">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="ibox-footer text-right">
                    <button class="btn btn-primary" type="button">Simpan</button>
                    <button class="btn btn-warning" type="button">Batal</button>
                </div>
            </div>

        </div>
    </div>
    
@endsection
@section('extra_script')
<script>
    
</script>
@endsection