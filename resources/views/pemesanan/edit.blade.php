<!-- Modal -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit pemesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action=pemesanan class="form-edit">
                    @csrf
                    @method('PUT')
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
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
