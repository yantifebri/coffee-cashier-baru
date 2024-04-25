<!-- Modal -->
<div class="modal fade" id="modalFormStok" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Stok</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="stok">
                    @csrf
                    <div class="mb-3">
                        <label for="jenis_id" class="form-label">Nama menu</label>
                        <div class="input-group">
                            <select class="form-select" name="menu_id" id="menu_id">
                                <option selected disabled>Pilih Nama menu</option>
                                @foreach ($menu as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_menu }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="jumlah" name='jumlah'>
                        </div>
                    </div>




                    {{-- <label for="terpenuhi" class="form-label">Terpenuh</label>
                <div class="mb-3">
                  <select class="form-control" name="terpenuhi" id="terpenuhi">
                    <option value="0" >tidak</option>
                    <option value="1" >ya</option>
                   </select>
                </div> --}}


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
