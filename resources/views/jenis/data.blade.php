<div class="mt-4">
    <table class="table table-compact table-stripped" id="myTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenis as $p)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $p->nama_jenis }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $p->id }}" data-nama_jenis = "{{ $p->nama_jenis }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('jenis.destroy', $p->id) }}" method="post" style="display: inline">
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
