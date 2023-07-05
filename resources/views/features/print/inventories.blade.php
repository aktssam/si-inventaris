@extends('features.print.layout')

@section('title', 'Data Inventaris')

@section('content')
  <h3 class="text-center mb-5">Laporan Data Aset Inventori</h3>
  <div class="table table-responsive text-nowrap">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Gudang</th>
          <th>Status</th>
          <th>Tanggal Masuk</th>
          <th>QR</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0" id="table_kendaraan">
        @foreach ($inventories as $inventory)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $inventory->name }}</td>
            <td>{{ $inventory->warehouse->name }}</td>
            <td>{{ $inventory->status }}</td>
            <td>{{ $inventory->check_in }}</td>
            <td>{{ QrCode::size(50)->generate("inventory/$inventory->id") }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  <script>
    window.print()
  </script>
@endsection
