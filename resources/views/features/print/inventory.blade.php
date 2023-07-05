@extends('features.print.layout')

@section('title', 'Data Inventaris')

@section('content')

  <h3>{{ $inventory->name }}</h3>
  <p class="mb-1">gudang: {{ $inventory->warehouse->name }}</p>
  <p class="mb-3">status: {{ $inventory->status }}</p>
  <div class="table table-responsive text-nowrap">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Uraian</th>
          <th style="width: 1px;">Tanggal</th>
          <th style="width: 1px;">Waktu</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0" id="table_kendaraan">
        @foreach ($inventory->conditions as $condition)
          <tr>
            <td style="width: 1px;">{{ $loop->index + 1 }}</td>
            <td>{{ $condition->description }}</td>
            <td style="width: 1px;">{{ $condition->updated_at->format('d/m/Y') }}</td>
            <td style="width: 1px;">{{ $condition->updated_at->format('H:i') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{ QrCode::size(100)->generate("inventory/$inventory->id") }}


  <script>
    window.print()
  </script>
@endsection
