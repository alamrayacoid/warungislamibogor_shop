    
    <div class="modal" id="modal-bayar" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    
                    <h4 class="modal-title text-center">Kirim Bukti Pembayaran</h4>
                    
                </div>
                <form id="form_gambar" action="<?php echo e(route('bayar.pembelian')); ?>" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="nota" id="cnota">
                    <div class="modal-body">

                        <div class="row">
                            

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Foto Bukti Pembayaran</label>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group text-center">
                                    <a href="#" title="Foto bukti transfer" data-gallery="">
                                        
                                        <img src="<?php echo e(asset('assets/img/add-image-icon-sm.png')); ?>" width="120px" height="120px">
                                    </a>
                                    <label class="btn btn-block btn-primary btn-sm mt-5" for="pilih-bukti">
                                        <input type="file" accept="image/*" name="gambar" id="pilih-bukti" class="d-none">
                                        <span>Pilih Foto</span>
                                    </label>
                                </div>
                            </div>



                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning" id="bayar" id="update-alamat">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/pembelian/modal-pembayaran.blade.php ENDPATH**/ ?>