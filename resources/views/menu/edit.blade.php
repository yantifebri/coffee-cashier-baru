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
                        <label for="nama_menu" class="col-sm-4 col-form-label">Nama Menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_menu" name='nama_menu'>
                        </div>

                        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="harga" name='harga'>
                        </div>

                        <label for="image" class="col-sm-4 col-form-label">Image</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="image" name='image'>
                        </div>

                        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi'>
                        </div>
                        <label for="jenis_id" class="col-sm-4 col-form-label">jenis_id</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jenis_id" name='jenis_id'>
                        </div>
                        {{-- <label for="terpenuhi" class="col-sm-4 col-form-label">Terpenuh</label>
                <div class="col-sm-8">
                  <select class="form-control" name="terpenuhi" id="terpenuhi">
                    <option value="0" >tidak</option>
                    <option value="1" >ya</option>
                   </select>
                </div> --}}


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
