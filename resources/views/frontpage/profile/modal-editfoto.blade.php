    {{-- Modal --}}
    <div class="modal" id="modal-foto" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    
                    <h4 class="modal-title text-center">Edit Foto</h4>
                    
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Pilih Area Crop</label>
                            <div class="form-group image-crop text-center m-auto" style="height: 400px;">
                                <img src="" class="hidden">
                            </div>
                        
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Preview Foto</label>
                            <div class="image-preview"></div>

                            <label class="btn btn-primary d-flex justify-content-center align-items-center btn-sm btn-block mt-3 mb-3" for="input-foto" style="height:50px;font-size:14px;">
                                Pilih Foto
                                <input type="file" accept="image/*" name="gambar" id="input-foto" class="d-none">
                            </label>
                            
                            <h3>Setting</h3>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-white" id="zoomIn" type="button">Zoom In</button>
                                <button class="btn btn-white" id="zoomOut" type="button">Zoom Out</button>
                                <button class="btn btn-white" id="rotateLeft" type="button">Rotate Left</button>
                                <button class="btn btn-white" id="rotateRight" type="button">Rotate Right</button>
                                <button class="btn btn-warning" id="resetCrop" type="button">Reset</button>
                            </div>
                        </div>

                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary simpan-foto" type="button" id="update-foto" data-dismiss="modal">Update Foto</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}