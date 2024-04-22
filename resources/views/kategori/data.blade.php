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
            @foreach ($kategori as $p)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $p->nama_kategori }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" data-id = "{{ $p->id }}" data-nama_kategori ="{{ $p->nama_kategori }}">

                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('kategori.destroy', $p->id) }}" method="post" style="display: inline">
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
