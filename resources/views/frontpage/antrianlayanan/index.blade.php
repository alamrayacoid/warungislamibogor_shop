@extends('frontpage.main-frontpage')
@section('extra_style')
<style type="text/css">
    .services-queue--header{
        padding: 10px 15px 15px 15px;
        display: flex;
        justify-content: center;
    }
.services-queue--img{
    width: 70px;
    height: 70px;
}    
.p-15{
    padding: 15px !important;
}
.services-queue--heading{
    display: flex;

    justify-content: space-between;
    padding:5px 15px;
    border-bottom: 1px solid #efeff4;
    margin-bottom: 2em;
}
.services-queue--body{
    display: flex;
    justify-content: space-between;
    padding: 10px 5px;
}
.services-queue--status{
        font-size: 13px;
    color: #009a51;
    font-family: 'Nunito Sans', sans-serif;
    font-weight: 600;
    letter-spacing: 1px;
}
.services-queue--date{
    color: #595959;
    font-size: 13px;
    font-family: 'Nunito Sans', sans-serif;
}
.services-queue--icon-date{
    color: #009a51;
    font-size: 16px;
}
.btn-add-services-queue-heading{
    background: #009a51;
    color: #fff !important;
    font-size: 12px;
    margin-bottom: 1em;
    letter-spacing: 1px;
}
.btn-remove-services-queue{
    position: absolute;
    background: red;
    color: #fff !important;
    z-index: 2;
    font-size: 13px;
    width: 25px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    right: 16px;
}
.number-services-queue--group{
    position: relative;
    display: flex;
    justify-content: center;
    top: -15px;
    width: 100%;
}
.number-services-queue{
    background: #009a51 !important;
    color: #fff !important;
    width: 30px;
    height: 30px;
    top: -10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 12px;
    font-weight: bold;
    border-radius: 100px;
}
.services-queue--heading h5{
    font-weight: 600;
}
.text-danger-services-queue{
    color: #e60000;

}
</style>
@endsection
@section('content')


<section style="margin-top:4.5em;">

    
        
        <ol class="breadcrumb breadcumb-header">
            <li><a href="#">Home</a></li>
            <li class="active">Antrian</li>
        </ol>
        <div class="container-fluid mt-5">
            <div class="loader-wib"></div>
            <div class="row">
                <div class="col-lg-2 col-md-3 column-profile-frame--sidebar">
                    <div class="thumbnail profile-frame--sidebar">
                        <div class="d-flex align-items-center padding-0-15">
                            <img src="env('APP_WIB')}}storage/image/member/profile/{{Auth::user()->cm_path}}"
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
                    <div class="thumbnail p-15">
                        <div class="row">
                            <input type="text" value="{{Auth::user()->cm_name}}" hidden id="customername">
                            <div class="services-queue--heading">
                                <h5>Riwayat Antrian Layanan</h5>
                                <button class="btn btn-add-services-queue-heading" id="tambah-antrian">Tambah Antrian</button>
                            </div>
                            @foreach($antrian as $row)
                            <div class="col-lg-3">
                                <div class="thumbnail" >
                                    @if($row->sq_status == 'O')

                                    <button class="btn btn-remove-services-queue" data-id="{{ $row->sq_id }}" type="button"><i class="fa fa-trash"></i></button>
                                    @else

                                    @endif
                                    <div class="number-services-queue--group ">
                                        <div class="number-services-queue">{{$row->sq_nomor}}</div>
                                    </div>
                                    
                                    
                                    <div class="services-queue--header" >
                                        <img src="{{asset('assets/img/queue.png')}}" class="services-queue--img">
                                    </div>
                                    <div class="services-queue--body" >
                                        <div class="services-queue--status">
                                        @if($row->sq_status == 'D')
                                            Selesai
                                        @elseif($row->sq_status == 'C')
                                            Batal
                                        @elseif($row->sq_status == 'O')
                                            Menunggu
                                        @endif
                                        </div>
                                        <div><i class="fa fa-clock-o services-queue--icon-date">&ensp;</i><span class="services-queue--date">{{ \Carbon\Carbon::parse($row->sq_date)->formatLocalized('%d %B %Y ') }}</span> </div>
                                    </div>
                            </div>
                            </div>
                            @endforeach
                            <div class="col-lg-12 mb-5 text-right">
                                {{$antrian->Links()}}
                            </div>
                        </div>
                        <div class="text-danger-services-queue">Perhatian, fitur ini digunakan untuk mendapatkan nomor antrian penjualan pada WIB Pusat</div>
                    </div>
                </div>
            </div>
    
    <button type="button" class="simpanprofile" hidden></button>
</section>
@endsection
@section('extra_script')
<script>
    $(document).ready(function () {
        $('#tambah-antrian').click(function(){
            swal({
                    title: "Apa anda yakin?",
                    text: "Anda akan meminta nomor antrian layanan penjualan!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak!",
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        antrian();
                    } else {
                        //
                    }
                });
        });
        function antrian() {
                let customer = $('#customername').val();
                $.ajax({
                    url: '{{route("add.antrian")}}',
                    method: 'POST',
                    data: {
                        '_token' : '{{ csrf_token() }}',
                        customer : customer,
                    },
                    success: function (get) {
                        if(get.status == 'Success'){
                            swal("Informasi!",
                            "Berhasil Mendapatkan Nomor Antrian Penjualan.",
                            "success");
                            setTimeout(function(){
                                location.reload();
                            }, 1000);
                        }else if(get.status == 'sudah ada'){
                            swal("Informasi!",
                            "Anda Sudah Memiliki Nomor Antrian.",
                            "error");
                        }else{
                            swal("Informasi!",
                            "Error Tidak Diketahui.",
                            "error");
                        }
                        
                    },
                    error: function (xhr, textStatus, errorThrowl) {
                        swal({
                                title: "Error",
                                text: "Eror Tidak Diketahui",
                                type: "error",
                                confirmButtonColor: "#DD6B55",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {} else {

                                }
                            });
                    }
                })
            }

        $('.btn-remove-services-queue').click(function(){
             var id = $(this).data("id");
            
            $.ajax({
                url: "{{url('nonaktif-antrian')}}",
                type: 'post',
                data: {

                    '_token': '{{csrf_token()}}',
                    "id": id,
                },
                success: function (){

                iziToast.success({
                    title: 'Berhasil!',
                    message: 'Membatalkan Antrian Layanan Penjualan',
                });
                setTimeout(function(){
                 location.reload();

                }, 1000);

                }
            });
        })
    });

</script>
@endsection