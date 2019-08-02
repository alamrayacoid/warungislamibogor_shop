<div class="modal modal-profile fade" id="mdl-ponsel" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-close-mdl-custom" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <h5>Ganti Nomor Handphone Anda</h5>
                <p>Anda dapat mengubah pengaturan akun Nomor Handphone anda sesuai keinginan.</p>
                <div class="form-group padding-15-0">
                <label class="label-profile">Nomor Handphone</label>
                    <input type="number" class="form-control fs-12" id="mdlponsel" value="{{Auth::user()->cm_nphone}}">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-save-profile-modal" id="update-ponsel">Simpan Sekarang</button>
                </div>
            </div>
        </div>

    </div>
</div>