<div class="modal modal-profile fade" id="mdl-jkel" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-close-mdl-custom" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <h5>Setting Jenis Kelamin Anda</h5>
                <p>Anda dapat mengubah pengaturan akun jenis kelamin anda sesuai keinginan.</p>
                <div class="form-group">
                    @if(Auth::user()->cm_gender === 'L')
                    <div class="d-flex justify-content-center mt-5">
                        <input type="radio" id="laki" name='gender' value="L" checked><label for="laki">Laki -
                            Laki</label>&ensp;&ensp;
                        <input type="radio" id="perempuan" name='gender' value="P"><label
                            for="perempuan">Perempuan</label>
                    </div>
                    @elseif(Auth::user()->cm_gender === 'P')
                    <div class="d-flex justify-content-center mt-5">
                        <input type="radio" id="laki" name='gender' value="L"><label for="laki">Laki -
                            Laki</label>&ensp;&ensp;
                        <input type="radio" id="perempuan" name='gender' value="P" checked><label
                            for="perempuan">Perempuan</label>
                    </div>
                    @else
                    <div class="d-flex justify-content-center mt-5">
                        <input type="radio" id="laki" name='gender' value="L"><label for="laki">Laki -
                            Laki</label>&ensp;&ensp;
                        <input type="radio" id="perempuan" name='gender' value="P"><label
                            for="perempuan">Perempuan</label>
                    </div>
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-save-profile-modal update-jeniskelamin">Simpan Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>