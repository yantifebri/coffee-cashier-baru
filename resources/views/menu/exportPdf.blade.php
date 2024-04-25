<table id="data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Image</th>
            <th>Deskripsi</th>
            <th>Jenis id</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $index => $j)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $j->nama_menu }}</td>
                <td>{{ $j->harga }}</td>
                <td>{{ $j->image }}</td>
                <td>{{ $j->deskripsi }}</td>
                <td>{{ $j->jenis_id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
    #data {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #data td,
    #data th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #data tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #data tr:hover {
        background-color: #ddd;
    }

    #data th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #569dcf;
        color: white;
    }
</style>
