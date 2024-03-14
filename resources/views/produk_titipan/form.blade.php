<!-- Modal -->
<div class="modal fade" id="modalFormProdukTitipan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Produk Titipan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="produk_titipan">
                    @csrf
                    <div class="form-group row">
                        <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_produk" name='nama_produk'>
                        </div>

                        <label for="nama_supplier" class="col-sm-4 col-form-label">Nama Supplier</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_supplier" name='nama_supplier'>
                        </div>

                        <div class="input-group mb-3">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Harga Beli</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" id="harga_beli" placeholder="harga_beli"
                                name="harga_beli" oninput="hitungHargaJual()">
                        </div>
                        <div class="input-group mb-3">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Harga Jual</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" id="harga_jual" placeholder="harga_jual"
                                name="harga_jual" readonly>
                        </div>

                        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="stok" name='stok'>
                        </div>

                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="keterangan" name='keterangan'>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
            </div>
        </div>
    </div>
    </form>

   
    @push('script')
        <script>
            function hitungHargaJual() {
                var hargaBeli = parseFloat(document.getElementById('harga_beli').value);
                var keuntungan = hargaBeli * 1.7;
                var hargaJual = Math.ceil(keuntungan / 500) * 500;
                document.getElementById('harga_jual').value = hargaJual.toFixed(2);
            }

            $(document).ready(function() {
                $('#harga_beli').on('input', function() {
                    var hargaBeli = $(this).val();
                    var keuntungan = hargaBeli * 1.7;
                    var hargaJual = Math.ceil(keuntungan / 500) * 500;
                    $('#harga_jual').val(hargaJual);
                });
            });
        </script>
    @endpush
