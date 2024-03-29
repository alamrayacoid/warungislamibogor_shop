<?php $__env->startSection('extra_style'); ?>
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

    .select2-container {
        width: 200px !important padding: 0;
        z-index: 999999;
    }
    .in{
    display: flex !important;
    align-items: center;
    padding-right: 0 !important;

}
.table-responsive{
    border:0 !important;   
    }
    .fs-12{
        font-size: 12px;
    }
    .mb-0{
        margin-bottom: 0 !important;
    }
    .label-profile::after{
        content: "*";
        color: red;
        font-size: 12px;
        font-weight: bold;
        padding-left: 5px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontpage.profile.modal-email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontpage.profile.modal-jeniskelamin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontpage.profile.modal-ponsel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontpage.profile.modal-password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontpage.profile.modal-rekening', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontpage.profile.modal-alamat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontpage.profile.modal-editfoto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section style="margin-top:4.5em;">

    <form id="frmeditprofile" method="post" action="<?php echo e(route('update.profile')); ?>" enctype="multipart/form-data"
        class="form-update-profile">
        <?php echo e(csrf_field()); ?>

        <input type="text" id="inputemail" value="<?php echo e(Auth::user()->cm_email); ?>" name="email" hidden>
        <input type="text" id="inputponsel" value="<?php echo e(Auth::user()->cm_nphone); ?>" name="nphone" hidden>
        <input type="text" id="inputpassword" name="newpassword" hidden>
        <input type="text" id="inputpasswordlama" name="oldpassword" hidden>
        <input type="text" id="inputpasswordkonfirmasi" name="confirmpassword" hidden>
        <input type="text" id="inputrekening" value="<?php echo e(Auth::user()->cm_bank); ?>" name="bank" hidden>
        <input type="text" id="inputnomorrekening" value="<?php echo e(Auth::user()->cm_nbank); ?>" name="nbank" hidden>
        <input type="text" id="inputjkel" value="<?php echo e(Auth::user()->cm_gender); ?>" name="gender" hidden>
        <input type="text" id="inputprovinsi" name="provinsi" value="<?php echo e(Auth::user()->cm_province); ?>" hidden>
        <input type="text" id="inputkabupaten" name="kabupaten" value="<?php echo e(Auth::user()->cm_city); ?>" hidden>
        <input type="text" id="inputkecamatan" name="kecamatan" value="<?php echo e(Auth::user()->cm_district); ?>" hidden>
        <input type="text" id="inputalamat" name="address" value="<?php echo e(Auth::user()->cm_address); ?>" hidden>
        <input type="text" id="inputkodepos" name="kodepos" value="<?php echo e(Auth::user()->cm_postalcode); ?>" hidden>
        <input type="hidden" id="gambar" name="gambar">
        <ol class="breadcrumb breadcumb-header">
            <li><a href="#">Home</a></li>
            <li class="active">Profile</li>
        </ol>
        <div class="container-fluid mt-5">
            <div class="loader-wib"></div>
            <div class="row">
                <div class="col-lg-2 col-md-3 column-profile-frame--sidebar" style="padding:0;">
                    <div class="thumbnail profile-frame--sidebar">
                        <div class="d-flex align-items-center padding-0-15">
                            <img src="env('APP_WIB')}}storage/image/member/profile/<?php echo e(Auth::user()->cm_path); ?>"
                                width="50px" height="50px">
                            <h5 class="title-profile-sidebar"><?php echo e(Auth::user()->cm_name); ?></h5>
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
                                <a href="<?php echo e(route('profile')); ?>" class="c-primary-wib fs-12 semi-bold">Lengkapi
                                    Sekarang&ensp;<i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5 class="heading-section-profile-frame padding-0-15">Daftar Transaksi</h5>
                            <ul class="list-item-profile-sidebar">
                                <a class="c-primary-wib semi-bold"
                                    href="<?php echo e(route('pembelian-semua-frontpage' , ['status' => 1])); ?>">
                                    <li>Daftar Pembelian</li>
                                </a>
                                <a class="c-primary-wib semi-bold"
                                    href="<?php echo e(route('pembelian-pembayaran-frontpage', ['status' => 2])); ?>">
                                    <li class="">Pembayaran</li>
                                </a>
                                <a class="c-primary-wib semi-bold"
                                    href="<?php echo e(route('pembelian-diproses-frontpage', ['status' => 3])); ?>">
                                    <li>Sedang diproses</li>
                                </a>
                            </ul>
                        </div>
                        <hr>
                        <div class="">
                            <h5 class="heading-section-profile-frame padding-0-15">Pengiriman</h5>
                            <ul class="list-item-profile-sidebar">
                                <a class="c-primary-wib semi-bold"
                                    href="<?php echo e(route('pembelian-dikirim-frontpage', ['status' => 4])); ?>">
                                    <li>Proses Pengiriman</li>
                                </a>
                            </ul>
                        </div>
                        <hr>
                        <div class="">
                            <h5 class="heading-section-profile-frame padding-0-15">Profile Saya</h5>
                            <ul class="list-item-profile-sidebar">
                                <a class="c-primary-wib semi-bold" href="<?php echo e(route('profile')); ?>">
                                    <li>Pengaturan</li>
                                </a>
                                <a class="c-primary-wib semi-bold" href="<?php echo e(route('wishlist-frontpage')); ?>">
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
                            <div class="tab-content tab-content-profile">
                                <div id="tab-1" class="tab-pane animated fadeIn active">
                                    <div class="row">
                                        <div class="col-lg-4 padding-15">
                                            <div class="profile-image-group padding-15">
                                                <img src="env('APP_WIB')}}storage/image/member/profile/<?php echo e(Auth::user()->cm_path); ?>"
                                                    class="image-profile-setting">
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
                                                        <div id=""><?php echo e(Auth::user()->cm_name); ?></div>
                                                    </div>
                                                </div>
                                                <div class="row column-group-basic-profile">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label>Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <?php if(Auth::user()->cm_gender === null || Auth::user()->cm_gender
                                                        === ''): ?>
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-jkel">Tambahkan Jenis
                                                            Kelamin</button>
                                                        <?php elseif(Auth::user()->cm_gender === 'L'): ?>
                                                        <span id="" class="mr-3">Laki - Laki</span>
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-jkel">Ubah Jenis
                                                            Kelamin</button>
                                                        <?php elseif(Auth::user()->cm_gender === 'P'): ?> <span id=""
                                                            class="mr-3">Perempuan</span>
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-jkel">Ubah Jenis
                                                            Kelamin</button>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                                <h5 class="title-section-form-profile">Ubah Daftar Kontak</h5>
                                                <div class="row column-group-basic-profile">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label>E-mail</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <span id="" class="mr-3"><?php echo e(Auth::user()->cm_email); ?></span>
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
                                                        <?php if(Auth::user()->cm_nphone === null || Auth::user()->cm_nphone
                                                        === ''): ?>
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-ponsel">Tambahkan
                                                            Nomor
                                                            Ponsel</button>
                                                        <?php else: ?>
                                                        <span id="" class="mr-3"><?php echo e(Auth::user()->cm_nphone); ?></span>
                                                        <button class="btn btn-update-basic-profile" type="button"
                                                            data-toggle="modal" data-target="#mdl-ponsel">Ubah Nomor
                                                            Ponsel</button>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane animated fadeIn">
                                    <?php if(Auth::user()->cm_address === null || Auth::user()->cm_address === ''): ?>
                                    <div class="column-empty-profile-advanced">
                                        <img src="<?php echo e(asset('assets/img/img-product/location-icon.png')); ?>">
                                        <h5 class="">Oops, Alamat Lengkap Anda Masih Kosong</h5>
                                        <p>Tambahkan Alamat Lengkap Anda untuk mempermudah proses transaksi di
                                            WIB shop
                                        </p>
                                        <button type="button" data-toggle="modal" data-target="#mdl-alamat">Tambahkan
                                            Alamat </button>
                                    </div>
                                    <?php else: ?>
                                    <div class="table-responsive">
                                        <table class="table-address-profile w-100">
                                            <thead>
                                                <tr class="c-primary-wib">
                                                    <th></th>
                                                    <th>Provinsi</th>
                                                    <th>Kabupaten</th>
                                                    <th>Kecamatan</th>
                                                    <th>Kode Pos</th>   
                                                    <th width="40%">Alamat Pengiriman</th>
                                                    <th>Aksi</th>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $alamat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="tbody-address-profile">
                                                    <th style="vertical-align:initial;padding-top:0.2em;"><input
                                                            type="radio" id="addressradio" name='addressradio'
                                                            checked><label for="addressradio" checked>
                                                        </label></th>
                                                    <td><?php echo e($row->p_nama); ?></td>
                                                    <td><?php echo e($row->c_nama); ?></td>
                                                    <td><?php echo e($row->d_nama); ?></td>
                                                    <td><?php echo e($row->cm_postalcode); ?></td>
                                                    <td><?php echo e(Auth::user()->cm_address); ?></td>
                                                    <td>
                                                        <button class="btn btn-update-profile-advanced alamat" type="button"
                                                            data-toggle="modal" data-target="#mdl-alamat"><i
                                                                class="fa fa-edit"></i>&ensp;Edit</button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div id="tab-3" class="tab-pane animated fadeIn">
                                    <?php if(Auth::user()->cm_bank === null || Auth::user()->cm_bank === ''): ?>
                                    <div class="column-empty-profile-advanced">
                                        <img src="<?php echo e(asset('assets/img/img-product/account-bank-icon.png')); ?>">
                                        <h5 class="">Oops, Rekening Bank Anda Masih Kosong</h5>
                                        <p>Tambahkan Rekening Bank Anda untuk mempermudah proses
                                            transaksi di WIB shop
                                        </p>
                                        <button type="button" data-toggle="modal" data-target="#mdl-rekening">Tambahkan
                                            Rekening Bank </button>
                                    </div>
                                    <?php else: ?>
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
                                                    <th style="vertical-align:initial;padding-top:0.2em;">
                                                        <input type="radio" id="rekening" name='rekening' checked><label
                                                            for="rekening" checked>
                                                        </label></th>
                                                    <td><?php echo e(Auth::user()->cm_bank); ?></td>
                                                    <td><?php echo e(Auth::user()->cm_nbank); ?></td>
                                                    <td>
                                                        <button class="btn btn-update-profile-advanced" type="button"
                                                            data-toggle="modal" data-target="#mdl-rekening"><i
                                                                class="fa fa-edit"></i>&ensp;Edit</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <button type="button" class="simpanprofile" hidden></button>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_script'); ?>
<script>
    $(document).ready(function () {

        $('#provinsi').change(function () {
            $.ajax({
                url: '<?php echo e(route("kota")); ?>',
                type: 'get',
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'provinsi': $('#provinsi').val()
                },
                success: function (get) {
                    console.log(get['kota']);
                    var html =
                        '<option value="-" selected="" disabled="">~ Pilih Kabupaten/Kota ~</option>';
                    for (var i = 0; i < get['kota'].length; i++) {
                        html += '<option value="' + get['kota'][i].c_id + '">' + get['kota']
                            [i].c_nama + '</option>';
                    }
                    $('#kota').html(html);
                }
            });
        })

        $('#kota').change(function () {
            $.ajax({
                url: '<?php echo e(route("desa")); ?>',
                type: 'get',
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'kota': $('#kota').val()
                },
                success: function (get) {
                    console.log(get);
                    var htmll =
                        '<option value="-" selected="" disabled="">~ Pilih Kecamatan ~</option>';
                    for (var i = 0; i < get['desa'].length; i++) {
                        htmll += '<option value="' + get['desa'][i].d_id + '">' + get[
                            'desa'][i].d_nama + '</option>';
                    }
                    $('#kecamatan').html(htmll);
                }
            });
        })

        $('.alamat').click(function(){
            var provinsi_trigger = '<?php echo e(Auth::user()->cm_province); ?>';
            var kota_trigger = '<?php echo e(Auth::user()->cm_city); ?>';
            var desa_trigger = '<?php echo e(Auth::user()->cm_district); ?>';
            console.log(provinsi_trigger);
            console.log(kota_trigger);
            $('#provinsi').val(provinsi_trigger).trigger('change');
            setTimeout(function(){
                $('#kota').val(kota_trigger).trigger('change');
                setTimeout(function(){
                    $('#kecamatan').val(desa_trigger).trigger('change');
                },800)
            },800)
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
        $('#update-alamat').on('click', function () {
            var emailtest = $('#emailtest').val();
            $('#inputemail').val(emailtest);
            $('#mdl-email').modal('hide');
            setTimeout(function () {
                $('.simpanprofile').click();
            }, 100)
        });
        $('#update-ponsel').on('click', function () {
            if ($('#mdlponsel').val() === '') {
                iziToast.error({
                    title: 'Peringatan!',
                    message: 'Nomor Handphone Wajib Diisi',
                });
            } else {
                var ponsel = $('#mdlponsel').val();
                $('#inputponsel').val(ponsel);
                $('#mdl-ponsel').modal('hide');
                setTimeout(function () {
                    $('.simpanprofile').click();
                }, 100)
            }
        });
        $('#update-password').on('click', function () {
            if ($('#mdlpassword').val() === '') {
                iziToast.error({
                    title: 'Peringatan!',
                    message: 'Password Baru Wajib Diisi',
                });
            } else {
                let passwordbaru = $('#mdlpassword').val();
                let passwordlama = $('#mdlpasswordlama').val();
                let passwordkonfirmasi = $('#mdlpasswordkonfirmasi').val();

                $('#inputpassword').val(passwordbaru);
                $('#inputpasswordlama').val(passwordlama);
                $('#inputpasswordkonfirmasi').val(passwordkonfirmasi);

                $('#mdl-password').modal('hide');
                setTimeout(function () {
                    $('.simpanprofile').click();
                }, 100)
            }
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
        $('.update-alamat').on('click', function () {
            $('#mdl-alamat').modal('hide');
            var provinsi = $('#provinsi').val();
            var kabupaten = $('#kota').val();
            var kecamatan = $('[name=district]').val();
            var alamat = $('.mdlalamat').val();
            var kodepos = $('.mdlkodepos').val();

            $('#inputkodepos').val(kodepos);
            $('#inputalamat').val(alamat);
            setTimeout(function () {
                $('.simpanprofile').click();
            }, 100)
        });

        $('#provinsi').change(function(){
            $('#inputprovinsi').val($('#provinsi').val());
            })

            $('#kota').change(function(){
            $('#inputkabupaten').val($('#kota').val());
            })

            $('#kecamatan').change(function(){
            $('#inputkecamatan').val($('#kecamatan').val());
            })
            
        $('.simpanprofile').on('click', function () {
            $.ajax({
                url: "<?php echo e(route('update.profile')); ?>",
                type: "post",
                data: $("#frmeditprofile").serialize(),
                success: function (data) {
                    if(data.status == 'password beda'){
                        iziToast.error({
                        title: 'Peringatan!',
                        message: 'Password baru dan Konfirmasi password baru tidak sama',
                    });
                    }else if(data.status == 'password lama beda'){
                        iziToast.error({
                        title: 'Peringatan!',
                        message: 'Password lama anda tidak sama dengan yang sebelumnya',
                    }); 
                    }else{
                        iziToast.success({
                        title: 'Berhasil!',
                        message: 'Berhasil Memperbarui Profile',
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                    }

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
    $.fn.modal.Constructor.prototype.enforceFocus = function () {};
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/profile/profile.blade.php ENDPATH**/ ?>