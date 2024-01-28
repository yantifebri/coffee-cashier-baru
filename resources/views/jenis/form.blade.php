<div class="modal fade" id="modalFormJenis" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jenis</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="jenis">
                    @csrf
                    <div class="form-group row">
                        <label for="nama_jenis" class="col-sm-4 col-form-label">Nama Jenis</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_jenis" name='nama_jenis'>


                        {{-- <label for="terpenuhi" class="col-sm-4 col-form-label">Terpenuh</label>
                <div class="col-sm-8">
                  <select class="form-control" name="terpenuhi" id="terpenuhi">
                    <option value="0" >tidak</option>
                    <option value="1" >ya</option>
                   </select>
                </div> --}}


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
            </div>
        </div>
    </div>
    </form>
