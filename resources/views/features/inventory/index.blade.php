@extends('layouts.core')

@section('title', 'Inventaris')

@section('content')

  <div class="col-md-8">
    <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Data Master /</span> Inventaris</h4>
  </div>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session('warning'))
    <div class="alert alert-primary alert-dismissible" role="alert">
      {{ session('warning') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <a href="{{ route('inventory.create') }}" class="btn btn-primary">
          <i class="tf-icons bx bx-plus-circle"></i>
          &nbsp; Tambah data
        </a>

        <a class="btn btn-outline-primary" href="{{ route('print.inventory.all') }}" target="_blank">
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
            <th>Status</th>
            <th class="d-flex justify-content-end">Opsi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" id="table_kendaraan">
          @foreach ($inventories as $inventory)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td><a href="{{ route('inventory.show', $inventory) }}"><strong>{{ $inventory->name }}</strong></a></td>
              <td>{{ $inventory->warehouse->name }}</td>
              <td><span
                  class="badge
                    @if ($inventory->status == 'unprocess') bg-secondary
                    @elseif ($inventory->status == 'delay') bg-warning
                    @elseif ($inventory->status == 'done') bg-success
                    @else bg-primary @endif
                ">
                  {{ $inventory->status }}
                </span></td>
              <td>
                <div class="d-flex justify-content-end">
                  <a class="btn btn-sm btn-outline-primary me-2" href="{{ route('inventory.edit', $inventory) }}"><i
                      class="bx bx-edit-alt"></i></a>
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
@endsection
