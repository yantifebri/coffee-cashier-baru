@extends('templates.layout')

@push('style')
@endpush
@section('content')
    <section class="content">
        <main id="main" class="main">
            <div class="c">
                <div class="pagetitle">
                    <h1>Pemesanan</h1>

                </div><!-- End Page Title -->

                <div class="container d-flex">
                    {{-- <div class="item header">Header</div> --}}
                    <div class="item" style="flex-basis: 60%;">
                        <ul class="menu-container">
                            @foreach ($jenis as $j)
                                <li>
                                    <h3>{{ $j->nama_jenis }}</h3>
                                    <ul class="menu-item" style="cursor: pointer;">
                                        @foreach ($j->menu as $menu)
                                            <li data-harga="{{ $menu->harga }}" data-id="{{ $menu->id }}">
                                                <div class="menu-itemmm"  >
                                                    <div class="menu-name">
                                                        <h6 style=" font-weight: bold;">{{ $menu->nama_menu }}</h6>
                                                    </div>

                                                    @if ($menu->stok->jumlah > 0)
                                                        <h6 style=" font-weight: bold;">Stok : {{ $menu->stok->jumlah }}
                                                        </h6>
                                                    @else
                                                        <h6 style="font-size: 13px; color: red;">Stok Habis</h6>
                                                    @endif

                                                    <div class="image-menu">
                                                        <img src="{{ asset('storage/' . $menu->image) }}"
                                                            alt="{{ $menu->nama_menu }} Image" style="width: 70px;">
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach


                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            {{-- <div class="item content">
                <h3>Order</h3>
                <ul class="ordered-list">

                </ul>
                Total Bayar : <h2 id="total"> 0</h2>
                <div>
                    <button id="btn-bayar">Bayar</button>
                </div>
            </div> --}}
            <div class="card" style="flex-basis: 35%;">
                <div class="card-body">
                    <h5 class="card-title">Order</h5>
                    <ul class="ordered-list">

                    </ul>
                    <h6 class="card-subtitle mb-2 text-muted"> Total Bayar : <h6 id="total"> 0</h6>
                    </h6>
                    <div>
                        <button type="button" class="btn btn-primary" id="btn-bayar">Bayar</button>
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </main><!-- End #main -->
    </section>
@endsection

@push('script')
    <script>
        $(function() {
            // Inisialisasi
            const orderedList = [];
            let total = 0;

            const sum = () => {
                return orderedList.reduce((accumulator, object) => {
                    return accumulator + (object.harga * object.qty);
                }, 0);
            };

            const changeQty = (el, inc) => {
                // Ubah di array
                const id = $(el).closest('li')[0].dataset.id;
                const index = orderedList.findIndex(list => list.menu_id == id);
                orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc;

                // Ubah qty dan ubah subtotal
                const txt_subtotal = $(el).closest('li').find('.subtotal')[0];
                const txt_qty = $(el).closest('li').find('.qty-item')[0];
                txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc;
                txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

                // Ubah jumlah total
                $('#total').html(`Rp.${sum()}`);
            };

            // Events
            $('.ordered-list').on('click', '.btn-dec', function() {
                changeQty(this, -1);
            });

            $('.ordered-list').on('click', '.btn-inc', function() {
                changeQty(this, 1); // Perbaiki parameter di sini
            });

            $('.ordered-list').on('click', '.remove-item', function() {
                const item = $(this).closest('li')[0];
                let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id));
                orderedList.splice(index, 1);
                $(this).closest('li').remove(); // Perbaiki pemanggilan remove
                $('#total').html(`Rp.${sum()}`);
            });

            $('#btn-bayar').on('click', function() {
                $.ajax({
                    url: "{{ route('transaksi.store') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        orderedList: orderedList,
                        total: sum()
                    },
                    success: function(data) { // Perbaiki pengejaan di sini
                        console.log('data')
                        console.log(data)
                        swal.fire({
                            title: data.message,
                            showDenyButton: true,
                            confirmButtonText: `Cetak Nota`,
                            denyButtonText: `OK`
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.open("{{ url('nota') }}/" + data.notrans)
                                // location.reload()
                            } else if (result.isDenied) {
                                location.reload()
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error)
                        // Swal.fire('Pemesanan Gagal!')
                    }
                });
            });

            $(".menu-item li").click(function() {
                // Mengambil data
                const menu_clicked = $(this).text();
                const data = $(this)[0].dataset;
                const harga = parseFloat(data.harga);
                const id = parseInt(data.id);

                if (orderedList.every(list => list.menu_id !== id)) {
                    let dataN = {
                        'menu_id': id,
                        'menu': menu_clicked,
                        'harga': harga,
                        'qty': 1
                    };
                    orderedList.push(dataN);
                    let listOrder =
                        `<li data-id="${id}" class="menu-itemm">
        <div class="nama-menu">
           <div class="item-info">
            <h5>${menu_clicked}</h5>
           </div>
        </div>
        <div class="quantity">
         <div class="quantity-controls">
            <div class="subtotal-info">
                <h6>Sub Total: <span class="subtotal">Rp.${harga * 1}</span></h6>
            </div>
            <button class="btn-dec border-0 rounded">-</button>
            <input class="qty-item" type="number" value="1" style="width:50px" readonly />
            <button class="btn-inc border-0 rounded">+</button>
            <button type="button" class='remove-item btn btn-danger'><i class="fas fa-trash"></i></button>
         </div>
         </div>
    </li>`;
                    $('.ordered-list').append(listOrder);
                }
                $('#total').html(`Rp.${sum()}`);
            });
        });
    </script>
@endpush
<style>
    .main {
        display: flex;
    }

    .c {
        width: 700px;
        display: flex;
        flex-direction: column;
    }



    .container {


        padding: 0px;
    }

    .item-content {
        width: 400px;
    }

    .menu-container {
        list-style-type: none;
        width: 650px;




    }


    .menu-container li h3 {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 18px;

        padding: 5px 15px;
        /* 10px; */
    }

    .menu-item {
        list-style-type: none;
        display: flex;
        /* Menjadikan menu-item sebagai flex container */
        flex-wrap: wrap;
        /* Mengizinkan item-item untuk melompat ke baris baru jika tidak cukup ruang */
        gap: 1em;
        /* Memberikan jarak antara item-item */
        align-items: center;
    }

    .menu-item li {
        flex: 0 0 calc(33.33% - 20px);
        /* Mengatur lebar item dengan 33.33% - 20px (untuk jarak antara item) */
        margin-bottom: 20px;
        /* Menambahkan margin bawah untuk jarak antar item */
        padding: 10px;
        /* Mengatur padding */
        background-color: rgb(255, 255, 255);
        /* Warna latar belakang */
        border-radius: 5px;
        /* Membuat sudut-sudut item menjadi bulat */
        box-shadow: 1px 4px 4px 4px rgba(0, 0, 0, 0.1);
        /* Menambahkan efek bayangan */
        display: flex;
        /* Menjadikan item sebagai flex container */
        justify-content: center;
        /* Mengatur posisi konten secara horizontal ke tengah */
        align-items: center;
        /* Mengatur posisi konten secara vertikal ke tengah */
        width: 1500px;
        /* Lebar tetap untuk setiap item */
        height: 150px;
        /* Tinggi tetap untuk setiap item */
    }

    .menu-name {
        padding: 5px;
        /* Padding untuk nama menu */
        text-align: center;
        /* Pusatkan teks */


    }

    .menu-itemm {

        list-style: none;
        margin: 10px;
        padding: 10px;
        background-color: rgb(255, 255, 255);
        border-radius: 5px;
        box-shadow: 1px 4px 4px 4px rgba(0, 0, 0, 0.1);

    }

    .item-info {
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
    }

    .quantity-controls {
        text-align: center;
    }

    .btn-dec,
    .btn-inc,
    .remove-item {
        margin: 5px;
        padding: 5px 10px;
        font-size: 16px;
    }

    .qty-item {
        width: 50px;
        text-align: center;
    }

    .subtotal-info {
        margin-top: 10px;
    }
</style>
