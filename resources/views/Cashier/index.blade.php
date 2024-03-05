@extends('layout.app')
@section('title','Cashier' )
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Create New Order</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('Cashier.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_transaksi">Tanggal Transaksi</label>
                            <input type="date" name="tanggal_transaksi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id_barang">Nama Pesanan</label>
                            <select id="id_barang" name="id_barang" class="form-control">
                                <option value="" disabled selected>Select barang</option>
                                @foreach ($StokBarang as $drug)
                                    <option value="{{ $drug->id }}">{{ $drug->id_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pesanan">Jumlah Pesanan</label>
                            <input type="number" name="jumlah_pesanan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <select id="harga" name="harga" class="form-control">
                                <option value="" disabled selected>Select harga</option>
                                @foreach ($StokBarang as $drug)
                                    <option value="{{ $drug->harga }}">{{ $drug->harga }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="row mt-6">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nama pesanan</th>
            <th>Jumlah pesanan</th>
            <th>Harga</th>
            <th>Tanggal transaksi</th>
            <th>Total bayar</th>
            <th>Action</th>
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
    <td>
        <form action="{{ route('print', $post->id) }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-info btn-sm">Print</button>
        </form>
    </td>
</tr>
@endforeach

    </tbody>
</table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
