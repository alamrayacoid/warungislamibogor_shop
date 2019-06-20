    {{-- Modal --}}
    <div class="modal" id="modal-gantialamat" role="dialog" aria-hidden="true">
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
                                <select class="form-control input-sm select2" name="">
                                    <option value="">~ Pilih Provinsi ~</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Kabupaten/Kota</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <select class="form-control input-sm select2" name="">
                                    <option value="">~ Pilih Kabupaten/Kota ~</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Kecamatan</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <select class="form-control input-sm select2" name="">
                                    <option value="">~ Pilih Kecamatan ~</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Alamat</label>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <textarea class="form-control" name=""></textarea>
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
    {{-- End Modal --}}