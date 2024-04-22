<!-- Modal -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Absensi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action=absensi_karyawan class="form-edit">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="namakaryawan" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="namaKaryawan" name='namaKaryawan'>
                        </div>

                        <label for="tanggalMasuk" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggalMasuk" name='tanggalMasuk'>
                        </div>

                        <label for="waktuMasuk" class="col-sm-4 col-form-label">Waktu Masuk</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="waktuMasuk" name='waktuMasuk'>
                        </div>

                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="status" name="status">
                                <option value="masuk">Masuk</option>
                                <option value="sakit">Sakit</option>
                                <option value="cuti">Cuti</option>
                            </select>
                        </div>

                        <label for="waktuKeluar" class="col-sm-4 col-form-label">Waktu Keluar</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="waktuKeluar" name='waktuKeluar'>
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
