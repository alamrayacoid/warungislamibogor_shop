    
    <div class="modal" id="modal-gantialamat" style="margin-top:10em;" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    
                    <h4 class="modal-title text-center">Ubah Alamat</h4>
                    
                </div>
                <div class="modal-body">

                    <div class="row">
                        

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Provinsi</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <select class="form-control input-sm select2" id="modalp" name="">
                                    <option value="">~ Pilih Provinsi ~</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Kabupaten/Kota</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <select class="form-control input-sm select2" id="modalk" name="">
                                    <option value="">~ Pilih Kabupaten/Kota ~</option>
                                    <option value="Surabaya">Surabaya</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Kecamatan</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <select class="form-control input-sm select2" id="modalkec" name="">
                                    <option value="">~ Pilih Kecamatan ~</option>
                                    <option value="Surabaya">Jambangan</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Alamat</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <textarea class="form-control" id="modalalamat" name=""></textarea>
                            </div>
                        </div>


                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" id="update-alamat" data-dismiss="modal">Ubah Alamat</button>
                </div>
            </div>
        </div>
    </div>
    <?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/checkout/modal_gantialamat.blade.php ENDPATH**/ ?>