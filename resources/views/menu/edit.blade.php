<!-- Modal -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action=menu class="form-edit">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="nama_menu" class="col-sm-4 col-form-label">Nama Menu</label>
                            <input type="text" class="form-control" id="nama_menu" name='nama_menu'>
                        </div>

                        <div class="col-sm-8">
                            <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name='harga'>
                        </div>

                        <div class="col-sm-8">
                            <label for="image" class="col-sm-4 col-form-label">Image</label>
                            <input type="file" class="form-control" id="image" name='image' accept="image/*">
                        </div>

                        <div class="col-sm-8">
                            <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi'>
                        </div>

                        <div class="col-sm-8">
                            <label for="jenis_id" class="col-sm-4 col-form-label">Jenis id</label>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- import --}}

    <div class="modal fade" id="formImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ url('menu/import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="menu">File Excel</label>
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
    </form
