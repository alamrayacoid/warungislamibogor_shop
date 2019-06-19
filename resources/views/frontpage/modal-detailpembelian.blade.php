    {{-- Modal --}}
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
                                <span>NOTA/20190509/XX</span>
                            </div>  

                            <div class="form-group">
                                <label class="d-block">Status Transaksi</label>
                                <span class="label label-info">Sedang Dikirim</span>
                                <span class="label label-warning">Pembayaran</span>
                                <span class="label label-success">Sedang Diproses</span>
                                <span class="label label-primary">Transaksi Selesai</span>
                            </div>  

                            <div class="form-group">
                                <label class="d-block">Tanggal Pembelian</label>
                                <span>9 Mei 2019</span>
                            </div>  

                       </div>
                       <div  class="col-sm-4 text-right">
                            <button type="button" class="btn btn-primary btn-outline">Salin Transaksi ke Nota Baru</button>
                       </div>
                   </div>

                   <div class="table-responsive mb-4">
                        <table class="table shoping-cart-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Daftar Produk</th>
                                    <th colspan="2">Harga Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($j=1;$j<=2;$j++)
                                    <tr>
                                        <td width="90">
                                            <img src="{{asset('assets/img/gallery/'.$j.'s.jpg')}}" width="100px">
                                        </td>
                                        <td class="desc">
                                            <h3>
                                                <a href="#" class="text-navy">
                                                    Text editor
                                                </a>
                                            </h3>
                                            <div class="m-t-sm">
                                                <span class="text-warning">Rp. 10.000</span>
                                                |
                                                <span class="text-muted">3 Produk</span>
                                            </div>
                                        </td>

                                        <td class="desc">
                                            <label class="d-block">Total Harga Produk</label>
                                            <span class="text-info">Rp. 30.000</span>
                                        </td>
                                        <td width="65">
                                            <button class="btn btn-warning" type="button">Belanja Lagi</button>
                                        </td>

                                    </tr>
                                @endfor
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
                                        Dikirim kepada <strong>Nama Customer</strong>
                                        <br>
                                        Jl. Alamat Customer
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
                                    <td class="desc">6 Barang</td>
                                </tr>
                                <tr>
                                    <td class="desc">Total Belanja</td>
                                    <td class="desc">Rp. 60.000</td>
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
    {{-- End Modal --}}