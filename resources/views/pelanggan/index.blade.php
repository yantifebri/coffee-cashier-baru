@extends('templates.layout')

@push('style')
@endpush
@section('content')
    <section class="content">
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Pelanggan</li>
                    </ol>
                </nav>
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
                        data-bs-target="#modalFormPelanggan">
                        <i class="fas fa-plus"></i> Tambah Pelanggan
                    </button>
                    <a href="{{ route('export-pelanggan') }}" class="btn btn-success">
                        <i class="fas fa-table"></i> Export XSLX
                    </a>
                    <a href="{{ route('pedeef') }}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </a>
                    <button href="{{ route('bebek') }}" type="button" class="btn btn-warning btn-import"
                        data-toggle="modal" data-target="#formImport">
                        <i class="fas fa-file-import"></i> Import </button>
                    </tbody>

                    </table>
                    @include('pelanggan.data')
                    @include('pelanggan.edit')
                    @include('pelanggan.form')
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
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })


        $(function() {
            $('#myTable').DataTable()
        })
        $('.delete-data').on('click', function(e) {
            const nama = $(this).closest('tr').find('td:eq(1)').text();
            console.log('tes')
            Swal.fire({
                icon: 'error',
                title: 'Hapus Data',
                html: `Apakah data <b>${nama}</b> akan di hapus?`,
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

            $('#modalEdit').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget)
                let id = $(button).data('id')
                let nama = $(button).data('nama')
                let email = $(button).data('email')
                let nomor_telepon = $(button).data('nomor_telepon')
                let alamat = $(button).data('alamat')



                $(this).find('#nama').val(nama)
                $(this).find('#email').val(email)
                $(this).find('#nomor_telepon').val(nomor_telepon)
                $(this).find('#alamat').val(alamat)


                $('.form-edit').attr('action', `/pelanggan/${id}`)
            })
        })
    </script>
@endpush
