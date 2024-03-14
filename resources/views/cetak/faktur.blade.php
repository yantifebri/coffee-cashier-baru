<body>
    <div class="de">
        <h2>Coffee</h2>
        <h5>Jl.Limbangansari Kp.gombong</h5>
        <hr>
        <h5>No.Faktur : {{ $transaksi->id }}</h5>
        <h5>{{ $transaksi->tanggal }}</h5>
        <table border="0">
            <thead>
                <tr>
                    <td>Qty</td>
                    <td>Item</td>
                    <td>Harga</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi->detailTransaksi as $item)
                    <tr>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->menu->nama_menu }}</td>
                        <td>{{ number_format($item->menu->harga, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .de {
        border: 1px solid #ccc;
        width: 50%;
        padding: 20px;
        box-sizing: border-box;
    }

    h2,
    h5 {
        text-align: center;
    }

    hr {
        width: 100%;
        border: 0;
        border-top: 1px solid #ccc;
        margin: 20px 0;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ccc;
    }

    tfoot td {
        font-weight: bold;
    }
</style>
