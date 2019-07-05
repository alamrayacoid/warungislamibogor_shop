    
<form id="salin_form" action="#" method="get">
    <?php echo csrf_field(); ?>
    <input type="hidden" id="notaa" name="nota">
    <div class="modal" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    
                    <h4 class="modal-title text-center">Detail Transaksi</h4>
                    
                </div>
                <div class="modal-body">
                    <div class="row">
                       <div class="col-sm-8">
                            <div class="form-group">
                                <label class="d-block">Nomor Nota</label>
                                <span id="nota"></span>
                            </div>  

                            <div class="form-group">
                                <label class="d-block">Status Transaksi</label>
                                <span id="status"></span>
                            </div>  

                            <div class="form-group">
                                <label class="d-block">Tanggal Pembelian</label>
                                <span id="date"></span>
                            </div> 
                       </div>
                       <div  class="col-sm-4 text-right">
                            <button id="salin" type="button" class="btn btn-warning btn-outline"><i class="fa fa-copy"></i> Salin Transaksi ke Nota Baru</button>
                       </div>
                   </div>

                   <div class="table-responsive mb-4">
                        <table class="table shoping-cart-table" id="table_detail" style="width: 100%">
                            <thead>
                                <tr>
                                    <th >Daftar Produk</th>
                                    <th  width="50%">Harga Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table shoping-cart-table">
                            <thead>
                                <tr>
                                    <th>Pengiriman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="desc">
                                        Dikirim kepada <strong id="customer"></strong>
                                        <p id="alamat"></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table shoping-cart-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="desc">Jumlah Barang</td>
                                    <td class="desc" id="total_barang"></td>
                                </tr>
                                <tr>
                                    <td class="desc">Total Belanja</td>
                                    <td class="desc" id="harga_total"></td>
                                </tr>
                                <tr>
                                    <td class="desc">Metode Pembayaran</td>
                                    <td class="desc">Cash</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</form>
    <?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/pembelian/modal-detailpembelian.blade.php ENDPATH**/ ?>