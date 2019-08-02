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

    .select2 {
        z-index: 99999999;
    }
</style>
@endsection
@section('content')
@include('frontpage.profile.modal-email')
@include('frontpage.profile.modal-jeniskelamin')
@include('frontpage.profile.modal-ponsel')
@include('frontpage.profile.modal-password')
@include('frontpage.profile.modal-rekening')
@include('frontpage.profile.modal-alamat')
<section style="margin-top:5em;">

    <form id="frmeditprofile" method="post" action="{{route('update.profile')}}" enctype="multipart/form-data"
        class="form-update-profile">
        {{csrf_field()}}
        <input type="text" id="inputemail" value="{{Auth::user()->cm_email}}" name="email" hidden>
        <input type="text" id="inputponsel" value="{{Auth::user()->cm_nphone}}" name="nphone" hidden>
        <input type="text" id="inputpassword" name="newpassword" hidden>
        <input type="text" id="inputrekening" name="bank" hidden>
        <input type="text" id="inputnomorrekening" name="nbank" hidden>
        <input type="text" id="inputjkel" name="gender" hidden>
        <input type="hidden" id="gambar" name="gambar">
        <ol class="breadcrumb breadcumb-header">
            <li><a href="#">Home</a></li>
            <li><a href="">Semua Transaksi</a></li>
        </ol>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-2 col-md-3 column-profile-frame--sidebar" style="padding:0;">
                    <div class="thumbnail profile-frame--sidebar">
                        <div class="d-flex align-items-center padding-0-15">
                            <img src="/warungislamibogor_shop/storage/image/member/profile/{{Auth::user()->cm_path}}"
                                width="50px" height="50px">
                            <h5 class="title-profile-sidebar">{{Auth::user()->cm_name}}</h5>
                        </div>
                        <div class="mt-4 padding-0-15">
                            <div class="">
                                <span class="fs-12 text-black-54">Kelengkapan Profil</span>
                                <span class="fs-11 text-black-7 bold pull-right">60%</span>
                            </div>
                            <div class="profile-progress-bar mt-2">
                                <div class="profile-progress-bar-status" style="width: 60%;"></div>
                            </div>
                            <div class="text-right">
                                <a href="{{route('profile')}}" class="c-primary-wib fs-12 semi-bold">Lengkapi
                                    Sekarang&ensp;<i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5 class="heading-section-profile-frame padding-0-15">Daftar Transaksi</h5>
                            <ul class="list-item-profile-sidebar">
                                <a class="c-primary-wib semi-bold"
                                    href="{{route('pembelian-semua-frontpage' , ['status' => 1])}}">
                                    <li>Daftar Pembelian</li>
                                </a>
                                <a class="c-primary-wib semi-bold"
                                    href="{{route('pembelian-pembayaran-frontpage', ['status' => 2])}}">
                                    <li class="">Pembayaran</li>
                                </a>
                                <a class="c-primary-wib semi-bold"
                                    href="{{route('pembelian-diproses-frontpage', ['status' => 3])}}">
                                    <li>Sedang diproses</li>
                                </a>
                            </ul>
                        </div>
                        <hr>
                        <div class="">
                            <h5 class="heading-section-profile-frame padding-0-15">Pengiriman</h5>
                            <ul class="list-item-profile-sidebar">
                                <a class="c-primary-wib semi-bold"
                                    href="{{route('pembelian-dikirim-frontpage', ['status' => 4])}}">
                                    <li>Proses Pengiriman</li>
                                </a>
                            </ul>
                        </div>
                        <hr>
                        <div class="">
                            <h5 class="heading-section-profile-frame padding-0-15">Profile Saya</h5>
                            <ul class="list-item-profile-sidebar">
                                <a class="c-primary-wib semi-bold" href="{{route('profile')}}">
                                    <li>Pengaturan</li>
                                </a>
                                <a class="c-primary-wib semi-bold" href="{{route('wishlist-frontpage')}}">
                                    <li>Barang Favorit</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="thumbnail p-0">
                        <div class="caption p-0">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs nav-tabs-custom">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab-1"><span class="tab-title">Biodata
                                                Diri</span></a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab-2"><span class="tab-title">Alamat</span></a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab-3"><span class="tab-title">Rekening
                                                Bank</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content tab-content-profile padding-15">
                                <div id="tab-1" class="tab-pane animated fadeIn active">
                                    <div class="row">
                                        <div class="col-lg-4 padding-15">
                                            <div class="profile-image-group padding-15">
                                                <img src="/warungislamibogor_shop/storage/image/member/profile/{{Auth::user()->cm_path}}"
                                                    class="image-profile-setting">
                                                @include('frontpage.profile.modal-editfoto')
                                                <button class="btn btn-upload-image-profile btn-block mt-5"
                                                    type="button" data-toggle="modal" data-target="#modal-foto">Upload
                                                    Foto </button>
                                                <p class="text-terms-upload-foto">Maksimal Ukuran File Foto 3
                                                    Megabytes<br>Format File
                                                    yang diperbolehkan: .JPG .JPEG .PNG</p>
                                            </div>
                                            <button class="btn btn-new-password-profile" type="button"
                                                data-toggle="modal" data-target="#mdl-password"><i
                                                    class="fa fa-lock"></i>&ensp;Buat
                                                Password Baru</button>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="ibox-content">
                                                <h5 class="title-section-form-profile padding-top-0">Ubah Biodata
                                                    Diri
                                                </h5>
                                                <div class="row column-group-basic-profile">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label>Nama</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div id="">{{Auth::user()->cm_name}}</div>
                                                    </div>
                                                </div>
                                                <div class="row column-group-basic-profile">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label>Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        @if(Auth::user()->cm_gender === null || Auth::user()->cm_gender === '')
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-jkel">Tambahkan Jenis
                                                            Kelamin</button>
                                                        @elseif(Auth::user()->cm_gender === 'L')
                                                        <span id="" class="mr-3">Laki - Laki</span>
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-jkel">Ubah Jenis
                                                            Kelamin</button>
                                                        @elseif(Auth::user()->cm_gender === 'P') <span id="" class="mr-3">Perempuan</span>
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-jkel">Ubah Jenis
                                                            Kelamin</button>
                                                        @endif
                                                    </div>

                                                </div>
                                                <h5 class="title-section-form-profile">Ubah Daftar Kontak</h5>
                                                <div class="row column-group-basic-profile">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label>E-mail</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <span id="" class="mr-3">{{Auth::user()->cm_email}}</span>
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-email">Ubah
                                                            Email</button>
                                                    </div>
                                                </div>
                                                <div class="row column-group-basic-profile">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label>No. Handphone</label>
                                                    </div>

                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        @if(Auth::user()->cm_nphone === null || Auth::user()->cm_nphone === '')
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-ponsel">Tambahkan
                                                            Nomor
                                                            Ponsel</button>
                                                        @else
                                                        <span id="" class="mr-3">{{Auth::user()->cm_nphone}}</span>
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-ponsel">Ubah Nomor
                                                            Ponsel</button>

                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane animated fadeIn" style="padding:15px 5px 30px 5px">
                                    @if(Auth::user()->cm_address === null || Auth::user()->cm_address === '')
                                    <div class="column-empty-profile-advanced">
                                        <img src="{{asset('assets/img/img-product/location-icon.png')}}">
                                        <h5 class="">Oops, Alamat Lengkap Anda Masih Kosong</h5>
                                        <p>Tambahkan Alamat Lengkap Anda untuk mempermudah proses transaksi di WIB shop
                                        </p>
                                        <button type="button" data-toggle="modal" data-target="#mdl-alamat">Tambahkan Alamat </button>
                                    </div>
                                    @else
                                    <div class="table-responsive">
                                        <table class="table-address-profile w-100">
                                            <thead>
                                                <tr class="c-primary-wib">
                                                    <th></th>
                                                    <th>Provinsi</th>
                                                    <th>Kabupaten</th>
                                                    <th>Kecamatan</th>
                                                    <th width="40%">Alamat Pengiriman</th>
                                                    <th>Aksi</th>
                                            </thead>
                                            <tbody>
                                                <tr class="tbody-address-profile">
                                                    <th style="vertical-align:initial;padding-top:0.2em;"><input
                                                            type="radio" id="address" name='address' checked><label
                                                            for="address" checked>
                                                        </label></th>
                                                    <td>Jawa Timur</td>
                                                    <td>Jawa Timur</td>
                                                    <td>Jawa Timur</td>
                                                    <td>Jl. Raya Surabaya - Malang, RT.02/RW.10, Lemahbang, Kec.
                                                        Sukorejo, Pasuruan, Jawa Timur 67161</td>
                                                    <td>
                                                        <button class="btn btn-update-profile-advanced"><i
                                                                class="fa fa-edit"></i>&ensp;Edit</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>
                                <div id="tab-3" class="tab-pane animated fadeIn">
                                    @if(Auth::user()->cm_bank === null || Auth::user()->cm_bank === '')
                                    <div class="column-empty-profile-advanced">
                                        <img src="{{asset('assets/img/img-product/account-bank-icon.png')}}">
                                        <h5 class="">Oops, Rekening Bank Anda Masih Kosong</h5>
                                        <p>Tambahkan Rekening Bank Anda untuk mempermudah proses transaksi di WIB shop
                                        </p>
                                        <button type="button" data-toggle="modal" data-target="#mdl-rekening">Tambahkan
                                            Rekening Bank </button>
                                    </div>
                                    @else
                                    <div class="table-responsive">
                                        <table class="table-address-profile w-100">
                                            <thead>
                                                <tr class="c-primary-wib">
                                                    <th></th>
                                                    <th>Nama Bank</th>
                                                    <th>Nomor Rekening</th>
                                                    <th>Aksi</th>
                                            </thead>
                                            <tbody class="">
                                                <tr class="tbody-address-profile">
                                                    <th style="vertical-align:initial;padding-top:0.2em;"><input
                                                            type="radio" id="rekening" name='rekening' checked><label
                                                            for="rekening" checked>
                                                        </label></th>
                                                    <td>{{Auth::user()->cm_bank}}</td>
                                                    <td>{{Auth::user()->cm_nbank}}</td>
                                                    <td>
                                                        <button class="btn btn-update-profile-advanced" type="button"
                                                            data-toggle="modal" data-target="#mdl-rekening"><i
                                                                class="fa fa-edit"></i>&ensp;Edit</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <button type="button" class="simpanprofile">
</section>
@endsection
@section('extra_script')
<script>
    $(document).ready(function () {


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
        $('#update-alamat').on('click', function () {
            var emailtest = $('#emailtest').val();
            $('#inputemail').val(emailtest);
            $('#mdl-email').modal('hide');
            setTimeout(function () {
                $('.simpanprofile').click();
            }, 100)
        });
        $('#update-ponsel').on('click', function () {
            var ponsel = $('#mdlponsel').val();
            $('#inputponsel').val(ponsel);
            $('#mdl-ponsel').modal('hide');
            setTimeout(function () {
                $('.simpanprofile').click();
            }, 100)
        });
        $('#update-password').on('click', function () {
            var passwordbaru = $('#mdlpassword').val();
            $('#inputpassword').val(passwordbaru);
            $('#mdl-password').modal('hide');
            setTimeout(function () {
                $('.simpanprofile').click();
            }, 100)
        });
        $('#update-rekening').on('click', function () {
            var namarekeing = $('.nama-bank').val();
            var nomorrekening = $('.nomor-bank').val();
            $('#inputrekening').val(namarekeing);
            $('#inputnomorrekening').val(nomorrekening);
            $('#mdl-rekening').modal('hide');
            setTimeout(function () {
                $('.simpanprofile').click();
            }, 100)
        });
        $('.simpan-foto').on('click', function () {
            setTimeout(function () {
                $('.simpanprofile').click();
            }, 50)
        });
        $('.update-jeniskelamin').on('click', function () {
            $('#inputjkel').val(($("input[name='gender']:checked").val()));
            $('#mdl-jkel').modal('hide');
            setTimeout(function () {
                $('.simpanprofile').click();
            }, 100)
        });
        $('.simpanprofile').on('click', function () {
            $.ajax({
                url: "{{ route('update.profile') }}",
                type: "post",
                data: $("#frmeditprofile").serialize(),
                success: function (data) {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Berhasil Memperbarui Profile',
                    });
                    // setTimeout(function () {
                    //     window.location.href = "{{route('home')}}";
                    // }, 1000);

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