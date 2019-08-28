<div class="modal modal-profile fade" id="mdl-alamat" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-close-mdl-custom" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <h5>Setting Alamat Lengkap Anda</h5>
                <p>Anda dapat mengubah pengaturan akun alamat lengkap anda sesuai keinginan.</p>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="label-profile">Provinsi</label>
                    <select class="form-control input-sm select2 mdlprovinsi" id="provinsi" name="province">
                        <option hidden value=> ~ pilih provinsi ~ </option>
                        @foreach($provinsi as $row)
                        <option value="{{$row->p_id}}">{{$row->p_nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="label-profile">Kabupaten/Kota</label>
                    <select class="form-control input-sm select2 mdlkabupaten" id="kota" name="city">
                        <option value=""> ~ pilih Kota~ </option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="label-profile">Kecamatan</label>
                    <select class="form-control input-sm select2 mdlkecamatan" id="kecamatan" name="district">
                        <option hidden value> ~ pilih Kecamatan ~ </option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="label-profile">Kode Pos</label>
                    <input type="number" class="form-control input-sm mdlkodepos" value="{{Auth::user()->cm_postalcode}}">
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="label-profile">Alamat</label>
                    <textarea class="form-control mdlalamat" rows="5">{{Auth::user()->cm_address}}</textarea>

                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-save-profile-modal update-alamat">Simpan Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>