{{-- Modal --}}
    <div class="modal" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                    <h4 class="modal-title text-center">Detail Transaksi</h4>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                        <div class="form-group">
                                <label class="d-block">Tanggal Pembelian</label>
                                <span id="date"></span>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Nomor Nota</label>
                                <span id="nota"></span>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table table-wib table-bordered" id="tabledetailtransaksi" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Satuan</th>
                                    <th>Jumlah Dibeli</th>
                                    <th class="text-right">Harga Per Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-second-wib table-hover">
                            <thead>
                                <tr>
                                    <th colspan="6">Pengiriman</th>
                                </tr>
                                <tr>
                                    <th>Nama Customer</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th width="30%">Alamat Lengkap</th>
                                    <th>Kode Pos</th>
                            </thead>
                            <tbody>
                                <tr style="text-align:left;">
                                    <td id="customer"></td>
                                    <td id="provinsi"></td>
                                    <td id="kecamatan"></td>
                                    <td id="district"></td>
                                    <td id="alamat"></td>
                                    <td id="kodepos"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-second-wib table-hover">
                            <thead>
                                <tr>
                                    <th colspan="4">Pembayaran</th>
                                </tr>
                                <tr>
                                    <th>Jumlah Barang</th>
                                    <th>Total belanja</th>
                                    <th>Metode Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="jumlahbarang"></td>
                                    <td id="harga_total" class="text-right"></td>
                                    <td id="metodepambayaran"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}