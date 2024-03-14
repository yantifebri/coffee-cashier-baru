@extends('templates.layout')

@push('style')
@endpush
@section('content')
    <section class="content">
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Produk Titipan</h1>

            </div><!-- End Page Title -->




            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Karyawan </h3> --}}

                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalFormProdukTitipan">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                    <a href="{{ route('export-Excel') }}" class="btn btn-success">
                        <i class="fas fa-table"></i> Export XSLX
                    </a>
                    <a href="{{ route('export-Pdf') }}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </a>
                    <button href="{{ route('import-excel') }}" type="button" class="btn btn-warning btn-import"
                        data-toggle="modal" data-target="#formImport">
                        <i class="fas fa-file-import"></i> Import </button>
                    </tbody>

                    </table>
                    @include('produk_titipan.data')
                    @include('produk_titipan.edit')
                    @include('produk_titipan.form')
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </main><!-- End #main -->
    </section>
@endsection

@push('script')
<script>
    function hitungHargaJual() {
        var hargaBeli = parseFloat(document.getElementById('harga_beli').value);
        var keuntungan = hargaBeli * 1.7;
        var hargaJual = Math.ceil(keuntungan / 500) * 500;
        document.getElementById('harga_jual').value = hargaJual.toFixed(2);
    }

$(document).ready(function() {
    $('#harga_beli').on('input', function() {
        var hargaBeli = $(this).val();
        var keuntungan = hargaBeli * 1.7;
        var hargaJual = Math.ceil(keuntungan / 500) * 500;
        $('#harga_jual').val(hargaJual);
    });
});
</script>   
    <script>
       
    $(function() {
    $('#myTable').DataTable()
    })

    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
    $('.alert-success').slideUp(500)
    })

    $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
    $('.alert-danger').slideUp(500)
    })



    $('.delete-data').on('click', function(e) {
    const nama_produk = $(this).closest('tr').find('td:eq(1)').text();
    console.log('tes')
    Swal.fire({
    icon: 'error',
    title: 'Hapus Data',
    html: `Apakah data <b>${nama_produk}</b> akan di hapus?`,
    confirmButtonText: 'Ya',
    denyButtonText: 'Tidak',
    'showDenyButton': true,
    focusConfirm: false
    }).then((result) => {
    if (result.isConfirmed)
    $(e.target).closest('form').submit()
    else swal.close()
    })
    })

    $(document).ready(function() {

    // Fungsi untuk menghitung harga jual otomatis saat input harga beli diubah


    $('#modalEdit').on('show.bs.modal', function(e) {
    let button = $(e.relatedTarget)
    let id = $(button).data('id')
    let nama_produk = $(button).data('nama_produk')
    let nama_supplier = $(button).data('nama_supplier')
    let harga_beli = $(button).data('harga_beli')
    let harga_jual = $(button).data('harga_jual')
    let stok = $(button).data('stok')
    let keterangan = $(button).data('keterangan')

    $(this).find('#nama_produk').val(nama_produk)
    $(this).find('#nama_supplier').val(nama_supplier)
    $(this).find('#harga_beli').val(harga_beli)
    $(this).find('#harga_jual').val(harga_jual)
    $(this).find('#stok').val(stok)
    $(this).find('#keterangan').val(keterangan)


    $('.form-edit').attr('action', `/produk_titipan/${id}`)
    })
    })
    </script>
  
@endpush
