<!-- Modal -->
<div class="modal fade" id="modalFormKaryawan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Karyawan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="karyawan" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nip" name='nip'>
                        </div>

                        <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nik" name='nik'>
                        </div>

                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name='nama'>
                        </div>

                        <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis kelamin</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jenis_kelamin" name='jenis_kelamin'>
                        </div>

                        <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tempat_lahir" name='tempat_lahir'>
                        </div>

                        <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal_lahir" name='tanggal_lahir'>
                        </div>

                        <label for="telepon" class="col-sm-4 col-form-label">Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telepon" name='telepon'>
                        </div>

                        <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="agama" name='agama'>
                        </div>

                        <label for="status_nikah" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="status_nikah" name='status_nikah'>
                        </div>

                        <label for="alamat" class="col-sm-4 col-form-label">alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name='alamat'>
                        </div>

                        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="foto" name='foto'>
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
