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
                        <li class="breadcrumb-item active">Meja</li>
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
                        data-bs-target="#modalFormMeja">
                        <i class="fas fa-plus"></i> Tambah Meja
                    </button>
                    <a href="{{ route('ikan') }}" class="btn btn-success">
                        <i class="fas fa-table"></i> Export XSLX
                    </a>
                    <a href="{{ route('hiu') }}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </a>
                    <button href="{{ route('bebek') }}" type="button" class="btn btn-warning btn-import"
                    data-toggle="modal" data-target="#formImport">
                    <i class="fas fa-file-import"></i> Import
                </button>
                    </tbody>

                    </table>
                    @include('meja.modal')
                    @include('meja.data')
                    @include('meja.edit')
                    @include('meja.form')
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
            const nomor_meja = $(this).closest('tr').find('td:eq(1)').text();
            console.log('tes')
            Swal.fire({
                icon: 'error',
                title: 'Hapus Data',
                html: `Apakah data <b>${nomor_meja}</b> akan di hapus?`,
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
                let nomor_meja  = $(button).data('nomor_meja')
                let kapasitas = $(button).data('kapasitas')
                let status = $(button).data('status')
              
                console.log(nomor_meja)
               


                $(this).find('#nomor_meja ').val(nomor_meja )
                $(this).find('#kapasitas').val(kapasitas)
                $(this).find('#status').val(status)
               
               

                $('.form-edit').attr('action', `/meja/${id}`)
            })
        })
    </script>
@endpush
