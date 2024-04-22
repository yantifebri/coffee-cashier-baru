<!-- Modal -->
<div class="modal fade" id="modalFormMenu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="menu" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="mb-3">
                            <label for="nama_menu" class="form-label">Nama Menu</label>
                            <input type="text" class="form-control" id="nama_menu" name='nama_menu'>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name='harga'>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name='image' accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi'>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_id" class="form-label">Jenis id</label>
                            <div class="input-group">
                                <select class="form-select" name="jenis_id" id="jenis_id">
                                    <option selected disabled>Pilih Jenis</option>
                                    @foreach ($jenis as $j)
                                        <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
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







    <!-- Modal -->
    <div class="modal fade" id="formImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Pengajuan Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ url('pengajuan/import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenis">File Excel</label>
                                <input type="file" name="import" id="import">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>

                </div>
            </div>
        </div>
    </div>
    </form>
