@extends('layouts.core')

@section('title', "Detail gudang | $warehouse->name")

@section('content')
  <h4 class="fw-bold py-3 mb-2">
    <span class="text-muted fw-light">Data Master / Gudang /</span> {{ $warehouse->name }}
  </h4>
  <div class="row">
    <div class="col-md-3 mb-3">
      <a href="{{ route('warehouse.index') }}" class="btn btn-link">↩ Kembali</a>
    </div>
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <a href="{{ route('inventory.create') }}" class="btn btn-primary">
            <input type="hidden" name="selected_warehouse_id" id="selected_warehouse_id" value="{{ $warehouse->id }}">
            <i class="tf-icons bx bx-plus-circle"></i>
            &nbsp; Tambah data
          </a>

          <a class="btn btn-outline-primary" target="_blank" href="{{ route('print.warehouse', $warehouse) }}">
            <span><i class="menu-icon tf-icons bx bx-printer"></i></span>
            Cetak PDF
          </a>

        </div>
      </div>
      <div class="table table-responsive text-nowrap">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Gudang</th>
              <th class="d-flex justify-content-end">Opsi</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0" id="table_kendaraan">
            @foreach ($inventories as $inventory)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><a href="{{ route('inventory.show', $inventory) }}"><strong>{{ $inventory->name }}</strong></a>
                </td>
                <td>{{ $inventory->warehouse->name }}</td>
                <td>
                  <div class="d-flex justify-content-end">
                    <a class="btn btn-sm btn-outline-primary me-2" href="{{ route('inventory.edit', $inventory) }}">
                      <i class="bx bx-edit-alt"></i>
                    </a>
                    <form action="{{ route('inventory.destroy', $inventory) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-sm btn-outline-danger"onclick="return confirm('Apakah anda yakin?')">
                        <i class="bx bx-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
