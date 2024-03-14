<!-- Modal -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Produk Titipan</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action=produk_tititpan class="form-edit">
                    @csrf
                    @method('PUT')
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

            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>
</form>


{{-- //import --}}
<div class="modal fade" id="formImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Produk Titipan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url('produk_titipan/import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="produk_titipan">File Excel</label>
                            <input type="file" name="import" id="import">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary">Upload</button>

            </div>
        </div>
    </div>
</div>
</form
