@extends('layouts.core')

@section('title', "Detail | $inventory->name")

@section('content')
  <div class="row">
    <div class="col-md-3 mb-3">
      <a href="{{ route('inventory.index') }}" class="btn btn-link">↩ Kembali</a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="card shadow mb-4 p-3 d-flex align-items-center">
        {{ QrCode::size(210)->generate("inventory/{$inventory->id}") }}
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-4 px-3 py-3">
        <div class="card-header py-3">
          <h3 class="card-title mb-0">Deskripsi</h3>
        </div>
        <div class=" card-body table-responsive text-nowrap">
          <table class="table table-bordered">
            <tbody class="table-border-bottom-0" id="table_kendaraan">
              <tr>
                <td style="width: 1px;"><strong>UID</strong></td>
                <td>{{ $inventory->uid }}</td>
              </tr>
              <tr>
                <td style="width: 1px;"><strong>Nama</strong></td>
                <td>{{ $inventory->name }}</td>
              </tr>
              <tr>
                <td><strong>Gudang</strong></td>
                <td>{{ $inventory->warehouse->name }}</td>
              </tr>
              <tr>
                <td><strong>Tgl masuk</strong></td>
                <td>{{ $inventory->updated_at->format('d M Y') }}</td>
              </tr>
              <tr>
                <td><strong>Harga</strong></td>
                <td>Rp{{ $inventory->price ?? 0 }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card mb-4">
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-disabled">
            Opsi
          </li>
          <li class="list-group-item dropdown-item">
            <a href="{{ route('inventory.edit', $inventory) }}"><span><i class="bx bx-edit"></i></span>&nbsp;&nbsp;
              Edit data</a>
          </li>
          <li class="list-group-item dropdown-item">
            <form action="{{ route('inventory.destroy', $inventory) }}" method="POST">
              @method('DELETE')
              @csrf
              <Button class="btn btn-link text-danger m-0 p-0" onclick="return confirm('Apakah anda yakin?')">
                <span><i class="bx bx-trash"></i></span>&nbsp;&nbsp; Hapus data
              </Button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
