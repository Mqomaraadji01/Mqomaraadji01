
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nama pesanan</th>
            <th>Jumlah pesanan</th>
            <th>Harga</th>
            <th>Tanggal transaksi</th>
            <th>Total bayar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Cashier as $post)
        <tr>
            <td>{{ $post->id_barang }}</td>
            <td>{{ $post->jumlah_pesanan }}</td>
            <td>{{ $post->harga }}</td>
            <td>{{ $post->tanggal_transaksi }}</td>
            <td>{{ $post->total_bayar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    window.print()
</script>
