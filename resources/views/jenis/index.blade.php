@extends('templates.layout')

@push('style')
@endpush
@section('content')
    <section class="content">
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Jenis</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Data</li>
                        <li class="breadcrumb-item active"><a href="/jenis">Jenis</a></li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <!-- Default box -->
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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormJenis">
                    <i class="fas fa-plus"></i> Tambah Jenis
                </button>
                <a href="{{ route('export-excel-jenis') }}" class="btn btn-success">
                    <i class="fas fa-table"></i> Export XSLX
                </a>
                <a href="{{ route('export-pdf-jenis') }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
                <button href="{{ route('bebek') }}" type="button" class="btn btn-warning btn-import" data-toggle="modal"
                    data-target="#formImport">
                    <i class="fas fa-file-import"></i> Import
                </button>

                </tbody>

                </table>
                @include('jenis.data')
                @include('jenis.edit')

            </div>
            <!-- /.card-body -->
            @include('jenis.form')
            <!-- /.card-footer-->

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
            const nama_jenis = $(this).closest('tr').find('td:eq(1)').text();
            console.log('tes')
            Swal.fire({
                icon: 'error',
                title: 'Hapus Data',
                html: `Apakah data <b>${nama_jenis}</b> akan di hapus?`,
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
                let nama_jenis = $(button).data('nama_jenis')
                console.log(nama_jenis)

                $(this).find('#nama_jenis').val(nama_jenis)

                $('.form-edit').attr('action', `/jenis/${id}`)
            })
        })
    </script>
@endpush
