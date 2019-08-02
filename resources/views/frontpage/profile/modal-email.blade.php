<div class="modal modal-profile fade" id="mdl-email" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-close-mdl-custom" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <h5>Setting Alamat Email Anda</h5>
                <p>Anda dapat mengubah pengaturan akun alamat email anda sesuai keinginan.</p>
                <div class="form-group padding-15-0">
                <label class="label-profile">Alamat Email</label>
                    <input type="text" class="form-control fs-12" name="email" id="emailtest" value="{{Auth::user()->cm_email}}">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-save-profile-modal" id="update-alamat">Simpan Sekarang</button>
                </div>
            </div>
        </div>

    </div>
</div>