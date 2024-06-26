@extends('templates.layout')

@push('style')
@endpush
@section('content')
    <section class="content">
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Pelanggan</h1>

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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormPelanggan">
                    <i class="fas fa-plus"></i> Tambah Pelanggan
                </button>
                <a href="{{ route('export-pelanggan') }}" class="btn btn-success">
                    <i class="fas fa-table"></i> Export XSLX
                </a>
                <a href="{{ route('pedeef') }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
                <button href="{{ route('bebek') }}" type="button" class="btn btn-warning btn-import" data-toggle="modal"
                    data-target="#formImport">
                    <i class="fas fa-file-import"></i> Import </button>
                </tbody>

                </table>
                @include('pelanggan.data')
                @include('pelanggan.edit')
                @include('pelanggan.form')
            </div>
            <!-- /.card-body -->

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
                let button = $(e.relatedTarget);
                let id = button.data('id');
                let nama = button.data('nama');
                let email = button.data('email');
                let nomor_telepon = button.data('nomor_telepon');
                let alamat = button.data('alamat');

                $(this).find('#nama').val(nama);
                $(this).find('#email').val(email);
                $(this).find('#nomor_telepon').val(nomor_telepon);
                $(this).find('#alamat').val(alamat);

                $('.form-edit').attr('action', `/pelanggan/${id}`);
            });
        });

        // $('#modalFormPelanggan').on('show.bs.modal', function(e) {
        //     const btn = $(e.relatedTarget)
        //     const modal = $(this)
        //     const mode = btn.data('mode')
        //     const id = btn.data('id')
        //     const nama = btn.data('nama')
        //     const email = btn.data('email')
        //     const ponsel = btn.data('nomor_telepon')
        //     const alamat = btn.data('alamat')

        //     // Membedakan Input Atau Edit
        //     if (mode === 'edit') {
        //         modal.find('.modal-title').text('Edit Data')
        //         modal.find('#nama').val(nama)
        //         modal.find('#email').val(email)
        //         modal.find('#nomor_telepon').val(nomor_telepon)
        //         modal.find('#alamat').val(alamat)
        //         modal.find('#method').html('@method('PUT')')
        //         modal.find('form').attr('action', {{ url('pelanggan') }} / $ {
        //             id
        //         })
        //     } else {
        //         modal.find('.modal-title').text('Tambah Data')
        //         modal.find('#nama_pelanggan').val('')
        //         modal.find('#email').val('')
        //         modal.find('#nomor_telepon').val('')
        //         modal.find('#alamat').val('')
        //         modal.find('#method').html('')
        //         modal.find('form').attr('action', '{{ url('pelanggan') }}')
        //     }
        // })
    </script>
@endpush
