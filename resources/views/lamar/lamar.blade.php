@extends('main')

@section('extra_style')
<style type="text/css">
.wizard > .content > .body
{
  position: relative;
}
legend{
  text-align: right;
}
.yearpicker{
  cursor: pointer;
}
</style>

@endsection

@section('content')
<div >
  <h1 >Lamar Lowongan</h1>

</div>

<hr style="border-color: #b9b9b9">

{{-- 
<div class="row">
   <div class="col-lg-12 fs-150">

      <p>
        <span class="badge badge-circle badge-primary">1</span>
        Which of the following jQuery method remove all or the specified class(es) from the set of matched elements?
      </p>
       
      <div class="ibox">
           
            <div class="ibox-content">

              

            </div>

      </div>

   </div> 
</div> --}}


<form class="" style="margin-bottom: 3cm">
  <div id="wizard">

      <h2>Data Diri</h2>
      <section>
          <div class="row">

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Nama Lengkap</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" name="">
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Tempat, Tanggal Lahir</label>
            </div>

            <div class="col-sm-5 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Tempat" name="">
              </div>
            </div>

            <div class="col-sm-5 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control datepicker" placeholder="Tanggal Lahir" name="">
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Usia</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="number" min="0" class="form-control" name="">
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Jenis Kelamin</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <label>
                  <input type="radio" name="jenis_kelamin" value="L">
                  <span>Laki-Laki</span>
                </label>
                <label>
                  <input type="radio" name="jenis_kelamin" value="P">
                  <span>Perempuan</span>
                </label>
              </div>
            </div>


            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Agama</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <select class="form-control" name="agama" id="agama">
                  <option value="-" selected="" disabled="">-- Pilih Agama --</option>
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                  <option value="katolik">Katolik</option>
                  <option value="budha">Budha</option>
                  <option value="hindu">Hindu</option>
                  <option value="konghuchu">Konghuchu</option>
                </select>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Tinggi Badan</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <div class="input-group">
                  <input type="number" min="0" class="form-control" name="">
                  <span class="input-group-addon">Cm</span>
                </div>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Berat Badan</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <div class="input-group">
                  <input type="number" min="0" class="form-control" name="">
                  <span class="input-group-addon">Kg</span>
                </div>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">NIK KTP/KK</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" name="">
              </div>
            </div>


            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Alamat Lengkap Sesuai KTP</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <textarea class="form-control" name=""></textarea>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Alamat Lengkap Sekarang</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <textarea class="form-control" name=""></textarea>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">No. Telepon</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" name="">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="button">Cek No. Telpon</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">No. WA</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" name="">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="button">Cek No. Wa</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">E-mail</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" name="">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="button">Cek E-mail</button>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Username Instagram</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" name="">
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Username Facebook</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" name="">
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Channel Youtube</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" name="">
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Status Pernikahan</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <select name="status_pernikahan" class="form-control">
                    <option value="" selected="" disabled="">~ Pilih Status Pernikahan ~</option>
                    <option value="menikah">Menikah</option>
                    <option value="belum menikah">Belum menikah</option>
                </select>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Nama Suami/Istri</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" name="nama_suami_istri">
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Anak</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control" name="anak">
              </div>
            </div>

          </div>
      </section>

      <h2>Pengalaman</h2>
      <section>
         <div class="row">

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Pendidikan Terakhir</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <select class="form-control" name="pendidikanterakhir" id="pendidikanterakhir">
                  <option value="-" selected="" disabled="">~ Pendidikan Terakhir ~</option>
                  <option value="SD">SD</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                  <option value="SMK">SMK</option>
                  <option value="D1">D1</option>
                  <option value="D2">D2</option>
                  <option value="D3">D3</option>
                  <option value="S1">S1</option>
                </select>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Nama Sekolah/Universitas</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" name="">
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Tahun Masuk</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control input-sm yearpicker" readonly="" placeholder="Tahun Masuk" name="">
                  <div class="input-group-btn">
                    <button class="btn btn-default btn-yearpicker" type="button"><i class="fa fa-calendar"></i></button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Tahun Lulus</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control input-sm yearpicker" readonly="" placeholder="Tahun Lulus" name="">
                  <div class="input-group-btn">
                    <button class="btn btn-default btn-yearpicker" type="button"><i class="fa fa-calendar"></i></button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2 col-xs-12">
              <label class="control-label">Jurusan</label>
            </div>

            <div class="col-sm-10 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" name="">
              </div>
            </div>

          </div>
          <h1 class="text-center">Daftar Pengalaman Kerja</h1>

          <div id="daftar-riwayat-hidup">
            <fieldset id="daftar-riwayat" style="border-color: #b9b9b9">
              <legend>
                <button class="btn btn-primary" id="btn-tambah-riwayat" type="button">Tambah Daftar Pengalaman Kerja</button>
              </legend>
              <div class="row">
                
                <div class="col-sm-2 col-xs-12">
                  <label class="control-label">Nama Perusahaan</label>
                </div>

                <div class="col-sm-10 col-xs-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="">
                  </div>
                </div>

                <div class="col-sm-2 col-xs-12">
                  <label class="control-label">Tahun</label>
                </div>

                <div class="col-sm-5 col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control input-sm yearpicker" readonly="" placeholder="Tahun Masuk" name="">
                      <div class="input-group-btn">
                        <button class="btn btn-default btn-yearpicker" type="button"><i class="fa fa-calendar"></i></button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-5 col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control input-sm yearpicker" readonly="" placeholder="Tahun Keluar" name="">
                      <div class="input-group-btn">
                        <button class="btn btn-default btn-yearpicker" type="button"><i class="fa fa-calendar"></i></button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-2 col-xs-12">
                  <label class="control-label">Job Desc</label>
                </div>

                <div class="col-sm-10 col-xs-12">
                  <div class="form-group">
                    <textarea class="form-control" name=""></textarea>
                  </div>
                </div>

              </div>
            </fieldset>
          </div>

          <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <h1 class="text-center">Daftar Pengalaman Organisasi</h1>

              <div class="table-responsive">

                <table class="table table-bordered table-hover" id="table-organisasi">
                  <thead>
                    <tr>
                      <th>Pengalaman</th>
                      <th width="1%">
                        <button class="btn btn-default text-dark" type="button" id="btn-tambah-organisasi"><i class="fa fa-plus"></i></button>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
                
              </div>
              
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <h1 class="text-center">Daftar Skill/Kemampuan</h1>

              <div class="table-responsive">

                <table class="table table-bordered table-hover" id="table-skill">
                  <thead>
                    <tr>
                      <th>Skill/Kemampuan</th>
                      <th width="1%">
                        <button class="btn btn-default text-dark" type="button" id="btn-tambah-skill"><i class="fa fa-plus"></i></button>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
                
              </div>
              
            </div>
          </div>
      </section>

      <h2>Lowongan Kerja</h2>
      <section>
        <div class="row">
          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Kode Lowongan</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <select class="form-control" name="">
                <option value="">~ Pilih Kode Lowongan ~</option>
              </select>
            </div>
          </div>

          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Jabatan</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control" readonly="" name="">
            </div>
          </div>

          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Posisi</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control" readonly="" name="">
            </div>
          </div>

          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Siap ditempatkan di lokasi kerja</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control" name="">
            </div>
          </div>

          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Alasan Melamar Diperusahaan Kami?</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <textarea class="form-control" name=""></textarea>
            </div>
          </div>

          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Kenapa Kami Harus Memilih Anda?</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <textarea class="form-control" name=""></textarea>
            </div>
          </div>

          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Dapat Informasi Loker dari mana?</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control" name="">
            </div>
          </div>
        </div>
      </section>

      <h2>Upload File</h2>
      <section>
        <div class="row">
          
          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Pas Foto 3x4 / 6x4</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="file" class="form-control" name="">
            </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Scan KTP</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="file" class="form-control" name="">
            </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Scan Ijazah Terakhir</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="file" class="form-control" name="">
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Scan Transkrip Nilai Ijazah Terakhir</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="file" class="form-control" name="">
            </div>
          </div>

        </div>
        
        <div class="row">


          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Scan Sertifikat, Piagam Penghargaan (jika ada)</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="file" class="form-control" name="">
            </div>
          </div>


        </div>
        
        <div class="row">


          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Scan Paklaring (jika ada)</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="file" class="form-control" name="">
            </div>
          </div>

          <div class="col-sm-4 col-xs-12">
            <label class="control-label">Scan berkas pendukung</label>
          </div>

          <div class="col-sm-8 col-xs-12">
            <div class="form-group">
              <input type="file" class="form-control" name="">
            </div>
          </div>
        </div>
      </section>

      <h2>Pernyataan</h2>
      <section>
        <label>
          <input type="checkbox" name="">
          <span>Siap ditempatkan di lokasi kerja yang dipilih</span>
        </label>
        <br>
        <label>
          <input type="checkbox" name="">
          <span>Siap ditempatkan di posisi yang dilamar atau sesuai kehendak perusahaan</span>
        </label>
        <br>
        <label>
          <input type="checkbox" name="">
          <span>Menyatakan jika mengisi formulir dengan jujur dan benar</span>
        </label>
        <br>
        <label>
          <input type="checkbox" name="">
          <span>Siap dibatalkan jika formulir tidak sesuai dengan yang aslinya</span>
        </label>
      </section>


  </div>
</form>



@endsection

@section('extra_script')


<script type="text/javascript">
  $(document).ready(function(){


    
    $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        // enableAllSteps:true
        showFinishButtonAlways:true,
        enableCancelButton:false,
        saveState:true,
        labels: {
            cancel: "Batal",
            current: "langkah saat ini:",
            pagination: "Pagination",
            finish: "Selesai",
            next: "Lanjut",
            previous: "Kembali",
            loading: "Sedang Memuat ..."
        },
        onFinishing: function (event, currentIndex) {
          return true; 
        }, 
        onFinished: function (event, currentIndex) {

        }
    });

    $('#btn-tambah-riwayat').click(function(){
      var el = $('#daftar-riwayat .row').html();

      var dom = '<fieldset style="border-color: #b9b9b9">' + 
                  '<legend>' + 
                    '<button class="btn btn-danger btn-hapus-riwayat" type="button">' +
                      '<i class="fa fa-trash"></i>'+
                    '</button>'+
                  '</legend>'+
                  el +
                '</fieldset>';

      $('#daftar-riwayat-hidup').append(dom);

      $('.yearpicker').datepicker({
            minViewMode:2,
            endDate:'today',
            // beforeShowDay:'enabled',
            format:'yyyy'
        });
    });

    $('.btn-yearpicker').click(function(){
      $(this).parents('.input-group').find('.yearpicker').focus();      
    });

    $('#daftar-riwayat-hidup').on('click', '.btn-yearpicker', function(){
      $(this).parents('.input-group').find('.yearpicker').focus();      

    });

    $('#daftar-riwayat-hidup').on('click', '.btn-hapus-riwayat', function(){

      $(this).parents('fieldset').remove();

    });
    $('#btn-tambah-organisasi').click(function(){

      var el = $('#tr-el table tbody').html();

      console.log('clicked');

      $('#table-organisasi tbody').append(el);

    });

    $('.datepicker').datepicker({
      format:'dd-mm-yyyy'
    });

        $('.yearpicker').datepicker({
            minViewMode:2,
            endDate:'today',
            // beforeShowDay:'enabled',
            format:'yyyy'
        });

    $('#table-organisasi tbody').on('click', '.btn-hapus-organisasi', function(){
      $(this).parents('tr').remove();
    });

  });
</script>
<div class="d-none" id="tr-el">
  <table>
    <tbody>
      <tr>
        <td>
          <input type="text" class="form-control input-sm" name="organisasi[]">
        </td>
        <td>
          <button class="btn btn-danger btn-sm btn-hapus-organisasi" type="button"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection