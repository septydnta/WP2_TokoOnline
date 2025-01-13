<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ccc;
    }

    table tr td {
        padding: 6px;
        font-weight: normal;
        border: 1px solid #ccc;
    }

    table th {
        background-color: #326949;
        /* Apply the color to table headers */
        color: white;
        /* Set text color to white for contrast */
        border: 1px solid #ccc;
    }

    /* Optional: You can apply the color to the entire table border as well */
    table {
        border: 2px solid #326949;
    }

    /* Optional: Apply color to even rows for better readability */
    table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Optional: Apply color to odd rows */
    table tbody tr:nth-child(odd) {
        background-color: #e9f4e9;
    }
</style>

<table>
    <tr>
        <td align="left">
            Perihal : {{ $judul }} <br>
            Tanggal Awal: {{ $tanggalAwal }} s/d Tanggal Akhir: {{ $tanggalAkhir }}
        </td>
    </tr>
</table>
<p></p>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cetak as $row)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $row->kategori->nama_kategori }} </td>
                <td>
                    @if ($row->status == 1)
                        Publis
                    @elseif($row->status == 0)
                        Blok
                    @endif
                </td>
                <td> {{ $row->nama_produk }} </td>
                <td> Rp. {{ number_format($row->harga, 0, ',', '.') }} </td>
                <td> {{ $row->stok }} </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    window.onload = function() {
        printStruk();
    }

    function printStruk() {
        window.print();
    }
</script>
