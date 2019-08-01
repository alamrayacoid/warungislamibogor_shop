@extends('frontpage.main-frontpage')
@section('extra_style')
<style type="text/css">
    .image-preview {
        height: 128px !important;
        width: 128px !important;
        overflow: hidden;
        text-align: center;
    }

    .foto-terpilih {
        width: 120px;
        height: 120px;
    }

    .foto-terpilih canvas {
        border: 7px solid white;
        box-shadow: 0 0 3px 1px gray;
        border-radius: 50%;
    }
</style>
@endsection
@section('content')
<section style="margin-top:10em;">
    <div class="container">
        <div class="row animated fadeInRight">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Detail Profil</h5>
                    </div>
                    <div>
                        <div class="ibox-content" align="center">
                            <img alt="image" width="200" class="img-responsive rounded"
                                src="/warungislamibogor_shop/storage/image/member/profile/{{Auth::user()->cm_path}}">
                        </div>
                        <div class="ibox-content profile-content">
                            <h4><strong>{{Auth::user()->cm_name}}</strong></h4>
                            <p><i class="fa fa-map-marker"> </i> &nbsp;{{Auth::user()->cm_address}}</p>
                            <p><i class="fa fa-envelope"> </i> &nbsp;{{Auth::user()->cm_email}}</p>
                            <p><i class="fa fa-phone"> </i> &nbsp;{{Auth::user()->cm_nphone}}</p>
                            <div class="row m-t-lg">
                                <div class="col-md-6">

                                    <h5><i class="fa fa-star"></i> <strong>{{$wishlist}}</strong> Barang</h5>
                                </div>
                                <div class="col-md-6">

                                    <h5><i class="fa fa-shopping-cart"></i> <strong>{{$transaksi}}</strong> Transaksi
                                    </h5>
                                </div>
                                {{-- <div class="col-md-4">
                                
                                <h5><strong>240</strong> Followers</h5>
                            </div> --}}
                            </div>
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-warning btn-sm btn-block"><i
                                                class="fa fa-pencil-alt"></i> Ubah Profile</button>
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
                    <form  id="frmeditprofile" method="post" action="{{route('update.profile')}}" enctype="multipart/form-data" >
                        {{csrf_field()}}
                        <input type="hidden" id="gambar" name="gambar">
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


                                        <button class="btn btn-info btn-block mt-5" type="button" data-toggle="modal"
                                            data-target="#modal-foto"> <i class="fa fa-picture-o"></i> Edit Foto</button>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Nama</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-sm"
                                            value="{{Auth::user()->cm_name}}" name="name">
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>E-mail</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-sm"
                                            value="{{Auth::user()->cm_email}}" name="email">
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>No. Handphone</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-sm"
                                            value="{{Auth::user()->cm_nphone}}" name="nphone">
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Provinsi</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <select class="form-control input-sm select2" id="provinsi" name="province">
                                            <option hidden value="{{Auth::user()->cm_province}}">
                                                {{Auth::user()->cm_province}}</option>
                                                @foreach($provinsi as $row)
                                                <option value="{{$row->p_id}}">{{$row->p_nama}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Kabupaten/Kota</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <select class="form-control input-sm select2" id="kota" name="city">
                                            <option value="{{Auth::user()->cm_city}}">{{Auth::user()->cm_city}}</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Kecamatan</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <select class="form-control input-sm select2" id="kecamatan" name="district">
                                            <option hidden value="{{Auth::user()->cm_district}}">
                                                {{Auth::user()->cm_district}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Alamat</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <textarea class="form-control"
                                            name="address">{{Auth::user()->cm_address}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Jenis Kelamin</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        @if(Auth::user()->cm_gender === 'L')
                                        <label class="mr-5"><input type="radio" name="gender" value="L" checked="">
                                            Laki-laki</label>
                                        <label><input type="radio" name="gender" value="P"> Perempuan</label>
                                        @elseif(Auth::user()->cm_gender === 'P')
                                        <label class="mr-5"><input type="radio" name="gender" value="L">
                                            Laki-laki</label>
                                        <label><input type="radio" name="gender" value="P" checked=""> Perempuan</label>
                                        @else
                                        <label class="mr-5"><input type="radio" name="gender" value="L">
                                            Laki-laki</label>
                                        <label><input type="radio" name="gender" value="P"> Perempuan</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Bank</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <select class="form-control input-sm" name="bank">
                                            <option value="" selected>~ Pilih Bank ~</option>
                                            <option value="BCA" {{ (Auth::user()->cm_bank == 'BCA') ? 'selected' : '' }}>BCA</option>
                                            <option value="BRI" {{ (Auth::user()->cm_bank == 'BRI') ? 'selected' : '' }}>BRI</option>
                                            <option value="BNI" {{ (Auth::user()->cm_bank == 'BNI') ? 'selected' : '' }}>BNI</option>
                                            <option value="BTN" {{ (Auth::user()->cm_bank == 'BTN') ? 'selected' : '' }}>BTN</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>No. Rekening</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control  input-sm"
                                            value="{{ Auth::user()->cm_nbank}}" name="nbank">
                                    </div>
                                </div>



                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Password baru</label>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control  input-sm" name="newpassword">
                                    </div>
                                </div>
                            </div>

                        </div>
                        </form>
                        <div class="ibox-footer text-right">
                            <button class="btn btn-primary" type="button" id="simpanprofile">Simpan</button>
                            <input type="submit" id="submit" name="" hidden="hidden">
                            <button class="btn btn-warning" type="button">Batal</button>
                        </div>
                    
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('extra_script')
<script>
    $(document).ready(function() {

        $('#provinsi').change(function(){
            $.ajax({
                url : '{{route("kota")}}',
                type : 'get',
                data : { '_token' : '{{csrf_token()}}' , 'provinsi' : $('#provinsi').val() },
                success : function(get){
                    console.log(get['kota']);
                    var html = '<option value="-" selected="" disabled="">~ Pilih Kabupaten/Kota ~</option>';
                    for (var i =0; i < get['kota'].length; i++) {
                        html += '<option value="'+get['kota'][i].c_id+'">'+get['kota'][i].c_nama+'</option>';
                    }
                        $('#kota').html(html);
                }
            });
        })

        $('#kota').change(function(){
            $.ajax({
                url : '{{route("desa")}}',
                type : 'get',
                data : { '_token' : '{{csrf_token()}}' , 'kota' : $('#kota').val() },
                success : function(get){
                    console.log(get);
                    var htmll = '<option value="-" selected="" disabled="">~ Pilih Kecamatan ~</option>';
                    for (var i =0; i < get['desa'].length; i++) {
                        htmll += '<option value="'+get['desa'][i].d_cid+'">'+get['desa'][i].d_nama+'</option>';
                    }
                        $('#kecamatan').html(htmll);
                }
            });
        })


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
            done: function (data) {

            }
        });

        var $inputImage = $("[name='gambar']");
        if (window.FileReader) {
            $inputImage.change(function () {
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

        $("#zoomIn").click(function () {
            $image.cropper("zoom", 0.1);
        });

        $("#zoomOut").click(function () {
            $image.cropper("zoom", -0.1);
        });

        $("#rotateLeft").click(function () {
            $image.cropper("rotate", 45);
        });

        $("#rotateRight").click(function () {
            $image.cropper("rotate", -45);
        });

        $("#resetCrop").click(function () {
            $image.cropper("reset");
        });

        $('#update-foto').click(function () {

            var is = $image.cropper("getCroppedCanvas", {
                width: 120,
                height: 120
            });

            $('.foto-terpilih').html(is);

            var urlll = $('#gambar').val($('.image-crop > img').cropper('getCroppedCanvas')
                .toDataURL());

            is.toBlob((blob) => {
                const formData = new FormData();

                formData.append('croppedImage', blob);
            });
        });
        $('#simpanprofile').on('click', function () {
            $.ajax({
                url: "{{ route('update.profile') }}",
                type: "post",
                data: $("#frmeditprofile").serialize(),
            
                success: function (data) {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Berhasil Memperbarui Profile',
                    });
                    setTimeout(function(){
                        window.location.href="{{route('home')}}";
                         }, 1000);
                    
                },
                error: function (xhr, textStatus, errorThrowl) {
                    iziToast.error({
                        title: 'Peringatan!',
                        message: 'gagal',
                    });

                }
            });

        });

    });
</script>
@endsection