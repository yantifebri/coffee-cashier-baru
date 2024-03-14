<div class="mt-4">
  
    <table class="table table-compact table-stripped" id="myTable">
        <thead>
            <tr>
            
                <th>No.</th>
                <th>Nama Produk </th>
                <th>Nama Supplier</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Keterangan</th>
              
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk_titipan as $p)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                 
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->nama_supplier}}</td>
                    <td>{{ $p->harga_beli }}</td>
                    <td>{{ $p->harga_jual }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modalEdit"
                            data-mode = "edit" 
                            data-id = "{{ $p->id }}"
                             data-nama_produk ="{{ $p->nama_produk }}"
                            data-nama_supplier="{{ $p->nama_supplier}}" 
                            data-harga_beli="{{ $p->harga_beli}}"
                            data-harga_jual="{{ $p->harga_jual}}"
                            data-stok ="{{ $p->stok }}" 
                            data-keterangan ="{{ $p->keterangan }}" 
                            >
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('produk_titipan.destroy', $p->id) }}" method="post" style="display: inline">
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
