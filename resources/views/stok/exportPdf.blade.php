<table id="data">
    <thead>
        <tr>
            <th>No</th>
            <th>Jumlah stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $j)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $j->jumlah }}</td>
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
