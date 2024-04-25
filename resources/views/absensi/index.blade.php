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
                        <li class="breadcrumb-item active">Absensi</li>
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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit">
                    <i class="fas fa-plus"></i> Tambah Absensi
                </button>
                <a href="{{ route('export-excell-absen') }}" class="btn btn-success">
                    <i class="fas fa-table"></i> Export XSLX
                </a>
                <a href="{{ route('absen-pdf-export') }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
                <button href="{{ route('import-absen') }}" type="button" class="btn btn-warning btn-import"
                    data-toggle="modal" data-target="#formImport">
                    <i class="fas fa-file-import"></i> Import
                </button>
                @include('absensi.data')
                {{-- @include('absensi.edit') --}}

            </div>
            <!-- /.card-body -->
            @include('absensi.form')
            {{-- @include('absensi.modal') --}}



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
            const namaKaryawan = $(this).closest('tr').find('td:eq(1)').text();
            console.log('tes')
            Swal.fire({
                icon: 'error',
                title: 'Hapus Data',
                html: `Apakah data <b>${namaKaryawan}</b> akan di hapus?`,
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
            $('#myTable tbody').on('dblclick', 'td', function() {
                var column_num = parseInt($(this).index()) + 1;
                var row_num = parseInt($(this).closest('tr').find('button[data-mode=edit]').data('id'));
                console.log(row_num)
                var col_name = $(this).closest('table').find('th').eq(column_num - 1).text();
                if (col_name === 'Status') {
                    var current_data = $(this).text();
                    $(this).html('<select class="form-control select-status" data-id="' + row_num + '">' +
                        '<option value="masuk">Masuk</option>' +
                        '<option value="sakit">Sakit</option>' +
                        '<option value="cuti">Cuti</option>' +
                        '</select>');
                    $(this).find('.select-status').val(current_data);

                }
            });

            $('#myTable tbody').on('change', '.select-status', function() {
                var new_status = $(this).val();
                var row_num = $(this).data('id');
                var valid_statuses = ['masuk', 'sakit', 'cuti']; // Daftar status yang valid

                if (!valid_statuses.includes(new_status)) {
                    var confirm_custom_status = confirm(
                        'Status tidak valid. Apakah Anda ingin menggunakan status kustom?');
                    if (confirm_custom_status) {
                        var input_status = prompt('Masukkan status baru:');
                        if (input_status !== null && input_status.trim() !== '') {
                            new_status = input_status.trim();
                        } else {
                            $(this).val($(this).data(
                                'prev-status'
                            )); // Kembalikan ke status sebelumnya jika status kustom tidak valid
                            return;
                        }
                    } else {
                        $(this).val($(this).data(
                            'prev-status'
                        )); // Kembalikan ke status sebelumnya jika tidak ingin menggunakan status kustom
                        return;
                    }
                }

                // Send the new status to the backend using AJAX
                $.ajax({
                    type: "POST",
                    url: "update-status",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        row_num: row_num,
                        new_status: new_status
                    },
                    success: function(response) {
                        // Handle the response
                        console.log(response);
                    },
                    error: function(error) {
                        // Handle the error
                        console.log(error);
                    }
                });

                $(this).parent().text(new_status);
            });


        });

        // $(document).ready(function() {

        //     $('#modalEdit').on('show.bs.modal', function(e) {
        //         let button = $(e.relatedTarget)
        //         let id = $(button).data('id')
        //         let namaKaryawan = $(button).data('namaKaryawan')
        //         let tanggalMasuk = $(button).data('tangalMasuk')
        //         let waktuMasuk = $(button).data('waktuMasuk')
        //         let status = $(button).data('status')
        //         let waktuKeluar = $(button).data('waktuKeluar')



        //         $(this).find('#namaKaryawan').val(namaKaryawan)
        //         $(this).find('#tanggalMasuk').val(tanggalMasuk)
        //         $(this).find('#waktuMasuk').val(waktuMasuk)
        //         $(this).find('#status').val(status)
        //         $(this).find('#waktuKeluar').val(waktuKeluar)


        //         $('.form-edit').attr('action', `/absensi/${id}`)
        //     })
        // })
        $('#modalEdit').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const namaKaryawan = btn.data('nama_karyawan')
            const tanggalMasuk = btn.data('tanggal_masuk')
            const waktuMasuk = btn.data('waktu_masuk')
            const status = btn.data('status')
            const waktuKeluar = btn.data('waktu_meluar')
            const id = btn.data('id')
            const modal = $(this)
            console.log(namaKaryawan)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Absensi')
                modal.find('#namaKaryawan').val(namaKaryawan)
                modal.find('#tanggalMasuk').val(tanggalMasuk)
                modal.find('#waktuMasuk').val(waktuMasuk)
                modal.find('#status').val(status)
                modal.find('#waktuKeluar').val(waktuKeluar)
                modal.find('.modal-body form').attr('action', '{{ url('absensi') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
                console.log(name)
            } else {
                modal.find('.modal-title').text('Input Data Absensi')
                modal.find('#namaKaryawan').val('')
                modal.find('#tanggalMasuk').val('')
                modal.find('#waktuMasuk').val('')
                modal.find('#status').val('')
                modal.find('#waktuKeluar').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('absensi') }}')
            }
        })
    </script>
@endpush
