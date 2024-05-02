<!-- Modal -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Stok</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="method"></div>
                <form method="post" action=stok class="form-edit">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="jenis_id" class="form-label">Nama menu</label>
                        <div class="input-group">
                            <select class="form-select" name="menu_id" id="menu_id" disabled>
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



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- import --}}

   