    
    <div class="modal" id="modal-bayar" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                    <h4 class="modal-title text-center">Kirim Bukti Pembayaran</h4>

                </div>
                <form id="form_gambar" action="<?php echo e(route('bayar.pembelian')); ?>" enctype="multipart/form-data"
                    method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="nota" id="cnota">
                    <div class="modal-body">

                        <div class="row" style="display:flex;flex-direction:column;align-items:center;">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group text-center">
                                    <div id="" class="d-flex justify-content-center preview-banner img-preview-tambah">
                                        <img src="<?php echo e(asset('assets/img/add-image-icon-sm.png')); ?>" width="auto"
                                            id="myimage" height="150px">
                                    </div>
                                    <label class="btn btn-block btn-primary bg-primary-wib fs-12 mt-5 btn-proof-payment" for="pilih-bukti">
                                        <input type="file" accept="image/*" name="gambar" id="pilih-bukti"
                                            class="tambahbanner d-none" style="display:none">
                                        <span>Pilih Bukti Pembayaran</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-send-payment bg-primary-wib" id="bayar" id="update-alamat">Kirim Bukti Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/pembelian/modal-pembayaran.blade.php ENDPATH**/ ?>