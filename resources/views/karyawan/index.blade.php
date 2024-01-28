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
                        <li class="breadcrumb-item active">Karyawan</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->




            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Karyawan </h3> --}}
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>

                    </div>
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
                        data-bs-target="#modalFormKaryawan">
                        <i class="fas fa-plus"></i> Tambah Karyawan
                    </button>
                    {{-- <a href="{{route('eksportExcel')}}" class="btn btn-success">
        <i class="fas fa-table"></i> Export XSLX
      </a>
      <a href="{{route('eksportPdf')}}" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Export PDF
      </a>
      <button href="{{route('import')}}" type="button" class="btn btn-warning btn-import" data-toggle="modal" data-target="#formImport">
        <i class="fas fa-file-import"></i>   Import
      </button> --}}

                    </tbody>

                    </table>
                    @include('karyawan.data')
                    @include('karyawan.edit')
                    @include('karyawan.form')
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
                let nip = $(button).data('nip')
                let nik = $(button).data('nik')
                let nama = $(button).data('nama')
                let jenis_kelamin = $(button).data('jenis_kelamin')
                let tempat_lahir = $(button).data('tempat_lahir')
                let tanggal_lahir = $(button).data('tanggal_lahir')
                let telepon = $(button).data('telepon')
                let agama = $(button).data('agama')
                let status_nikah = $(button).data('status_nikah')
                let alamat = $(button).data('alamat')
                let foto = $(button).data('foto')


                $(this).find('#nip').val(nip)
                $(this).find('#nik ').val(nik)
                $(this).find('#nama').val(nama)
                $(this).find('#jenis_kelamin').val(jenis_kelamin)
                $(this).find('#tempat_lahir').val(tempat_lahir)
                $(this).find('#tanggal_lahir').val(tanggal_lahir)
                $(this).find('#telepon').val(telepon)
                $(this).find('#agama').val(agama)
                $(this).find('#status_nikah').val(status_nikah)
                $(this).find('#alamat').val(alamat)
                $(this).find('#foto').val(foto)

                $('.form-edit').attr('action', `/karyawan/${id}`)
            })
        })
    </script>
@endpush
