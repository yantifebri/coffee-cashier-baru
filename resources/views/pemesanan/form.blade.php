<!-- Modal -->
<div class="modal fade" id="modalFormPemesanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pemesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="pemesanan">
                    @csrf
                    <div class="form-group row">
                        <label for="tanggal_pemesanan" class="col-sm-4 col-form-label">Tanggal Pemesanan</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal_pemesanan" name='tanggal_pemesanan'>
                        </div>

                        <label for="jam_mulai" class="col-sm-4 col-form-label">Jam mulai</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="jam_mulai" name='jam_mulai'>
                        </div>

                        <label for="jam_selesai" class="col-sm-4 col-form-label">Jam selesai</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="jam_selesai" name='jam_selesai'>
                        </div>

                        <label for="nama_pemesan" class="col-sm-4 col-form-label">Nama pemesan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_pemesan" name='nama_pemesan'>
                        </div>

                        <label for="jumlah_pelanggan" class="col-sm-4 col-form-label">Jumlah pelanggan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jumlah_pelanggan" name='jumlah_pelanggan'>
                        </div>



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
