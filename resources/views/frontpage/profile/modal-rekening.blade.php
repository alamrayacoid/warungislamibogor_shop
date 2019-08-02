<div class="modal modal-profile fade" id="mdl-rekening" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-close-mdl-custom" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <h5>Setting Rekening Bank Anda</h5>
                <p>Anda dapat mengubah pengaturan akun Rekening Bank anda sesuai keinginan.</p>
                <div class="form-group padding-15-0">
                    <label class="label-profile">Nama Bank</label>
                    <select class="form-control fs-12 nama-bank" name="bank">
                        <option value="" selected>Pilih Bank </option>
                        <option value="BCA" {{ (Auth::user()->cm_bank == 'BCA') ? 'selected' : '' }}>BCA</option>
                        <option value="BRI" {{ (Auth::user()->cm_bank == 'BRI') ? 'selected' : '' }}>BRI</option>
                        <option value="BNI" {{ (Auth::user()->cm_bank == 'BNI') ? 'selected' : '' }}>BNI</option>
                        <option value="BTN" {{ (Auth::user()->cm_bank == 'BTN') ? 'selected' : '' }}>BTN</option>
                    </select>
                    <label class="label-profile">Nomor Rekening</label>
                    <input type="text" class="form-control fs-12 nomor-bank" 
                        value="{{Auth::user()->cm_nbank}}" placeholder="Masukkan Nomor Rekening Anda">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-save-profile-modal" id="update-rekening">Simpan Sekarang</button>
                </div>
            </div>
        </div>

    </div>
</div>