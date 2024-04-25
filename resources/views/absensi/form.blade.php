<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Absensi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="absensi">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row">
                        <div class="mb-3">
                            <label for="namaKaryawan" class="col-sm-4 col-form-label">Nama Karyawan</label>
                            <div class="">
                                <input type="text" class="form-control" id="namaKaryawan" name='namaKaryawan'>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tanggalMasuk" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                            <div class="">
                                <input type="date" class="form-control" id="tanggalMasuk" name='tanggalMasuk'>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="waktuMasuk" class="col-sm-4 col-form-label">Waktu Masuk</label>
                            <div class="">
                                <input type="time" class="form-control" id="waktuMasuk" name='waktuMasuk'>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="">
                                <select class="form-select" id="status" name="status">
                                    <option value="masuk">Masuk</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="cuti">Cuti</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="waktuKeluar" class="col-sm-4 col-form-label">Waktu Keluar</label>
                            <div class="">
                                <input type="time" class="form-control" id="waktuKeluar" name='waktuKeluar'>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>
{{-- import --}}
<div class="modal fade" id="formImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url('absensi/import') }}" enctype="multipart/form-data">
                    <div id="method"></div>
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
