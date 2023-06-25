@extends('features.print.layout')

@section('title', 'Data Inventaris')

@section('content')
  <div class="table table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Gudang</th>
          <th>Tanggal Masuk</th>
          <th>Harga</th>
          <th>QR</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0" id="table_kendaraan">
        @foreach ($inventories as $inventory)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $inventory->name }}</td>
            <td>{{ $inventory->warehouse->name }}</td>
            <td>{{ $inventory->updated_at->format('d M Y') }}</td>
            <td>Rp{{ $inventory->price ?? 0 }}</td>
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
