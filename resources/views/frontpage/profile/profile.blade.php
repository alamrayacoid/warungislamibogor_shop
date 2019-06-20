@extends('frontpage.main-frontpage')
@section('extra_style')
<style type="text/css">

    .image-preview{
        height: 128px !important;
        width: 128px !important;
        overflow: hidden;
        text-align: center;
    }
    .foto-terpilih{
        width: 120px;
        height: 120px;
    }
    .foto-terpilih canvas{
          border:7px solid white;
          box-shadow: 0 0 3px 1px gray;
          border-radius: 50%;
    }
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
                            <label>Foto</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group text-center">
                                <div class="foto-terpilih m-auto">
                                    
                                </div>

                                @include('frontpage.profile.modal-editfoto')


                                <button class="btn btn-info btn-block mt-5" type="button" data-toggle="modal" data-target="#modal-foto"> <i class="fa fa-images"></i> Edit Foto</button>
                            </div>
                        </div>

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

    $(document).ready(function(){


            var $image = $(".image-crop > img");
            $($image).cropper({
                aspectRatio: 1 / 1,
                preview: ".image-preview",
                autoCropArea: 0,
                strict: true,
                guides: true,
                highlight: true,
                dragCrop: true,
                cropBoxMovable: true,
                cropBoxResizable: true,
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("[name='foto']");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#resetCrop").click(function() {
                $image.cropper("reset");
            });

            $('#update-foto').click(function(){

                var is = $image.cropper("getCroppedCanvas", { width: 120, height: 120 });

                $('.foto-terpilih').html(is);

                is.toBlob((blob) => {
                  const formData = new FormData();

                  formData.append('croppedImage', blob);
                });
            })

    });
</script>
@endsection