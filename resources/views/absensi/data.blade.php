<div class="mt-4">
    <table class="table table-compact table-stripped" id="myTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Karyawan </th>
                <th>Tanggal Masuk</th>
                <th>Waktu Masuk</th>
                <th>Status</th>
                <th>Waktu Selesai Kerja</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensiKaryawan as $p)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>

                    <td>{{ $p->namaKaryawan }}</td>
                    <td>{{ $p->tanggalMasuk }}</td>
                    <td>{{ $p->waktuMasuk }}</td>
                    <td>{{ $p->status }}</td>

                    <td>{{ $p->waktuKeluar }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $p->id }}" data-nama_karyawan ="{{ $p->namaKaryawan }}"
                            data-tanggal_masuk ="{{ $p->tanggalMasuk }}" data-waktu_masuk="{{ $p->waktuMasuk }}"
                            data-status ="{{ $p->status }}" data-waktu_keluar ="{{ $p->waktuKeluar }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('absensi.destroy', $p->id) }}" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn delete-data btn-danger"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>
