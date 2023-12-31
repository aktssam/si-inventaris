@extends('features.print.layout')

@section('title', 'Data Gudang')

@section('content')
  @foreach ($warehouses as $warehouse)
    @php
      $inventories = $warehouse->inventories->load('warehouse');
    @endphp

    <h3 class="h3 fw-medium text-md-start mb-2">{{ $loop->index + 1 }}. {{ $warehouse->name }}</h3>
    <p class="fs-6 mb-1">Jumlah aset: {{ $inventories->count() ?? 0 }}</h3>
    <div class="table table-responsive text-nowrap mb-52">
      <table class="table table-bordered">
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
  @endforeach

  <script>
    window.print()
  </script>
@endsection
