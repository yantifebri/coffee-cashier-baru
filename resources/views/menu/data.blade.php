<div class="mt-4">
    <table class="table table-compact table-stripped" id="myTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama menu</th>
                <th>Harga</th>
                <th>Image</th>
                <th>Deskripsi</th>
                <th>Jenis id</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as $p)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>

                    <td>{{ $p->nama_menu }}</td>
                    <td>{{ $p->harga }}</td>
                    <td><img src="{{ asset('storage/' . $p->image) }}" class="" alt="foto {{ $p->nama_menu }}"
                            style="width: 60px"></td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>{{ $p->jenis->nama_jenis }}</td>

                    {{-- <td>{{ $p->terpenuhi === 1 ? 'Ya' : 'Tidak'}}</td> --}}
                    {{-- <td>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox"  id="flexSwitchCheckDefault" @if ($p->terpenuhi)checked @endif disabled>
                    <label  class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div>
            </td> --}}

                    <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal"
                            data-target="#modalEdit" data-mode = "edit" data-id = "{{ $p->id }}"
                            data-nama_menu ="{{ $p->nama_menu }}" data-harga="{{ $p->harga }}"
                            data-image ="{{ $p->image }}" data-deskripsi ="{{ $p->deskripsi }}"
                            data-jenis_id ="{{ $p->jenis_id }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('menu.destroy', $p->id) }}" method="post" style="display: inline">
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
