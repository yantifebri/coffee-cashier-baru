<div class="mt-4">
    <table class="table table-compact table-stripped" id="myTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama </th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
              
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $p)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                 
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->email}}</td>
                    <td>{{ $p->nomor_telepon }}</td>
                    <td>{{ $p->alamat }}</td>
                    
                    {{-- <td>{{ $p->terpenuhi === 1 ? 'Ya' : 'Tidak'}}</td> --}}
                    {{-- <td>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox"  id="flexSwitchCheckDefault" @if ($p->terpenuhi)checked @endif disabled>
                    <label  class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div>
            </td> --}}

                    <td>
                        <button type="button" class="btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                        data-mode="edit" data-id="{{ $p->id }}" data-nama="{{ $p->nama }}"
                        data-email="{{ $p->email }}" data-nomor_telepon="{{ $p->nomor_telepon }}"
                        data-alamat="{{ $p->alamat }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    
                        <form action="{{ route('pelanggan.destroy', $p->id) }}" method="post" style="display: inline">
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
