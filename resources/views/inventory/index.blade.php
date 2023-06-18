@extends('layouts.core')

@section('title', 'Inventaris')

@section('content')
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Inventaris</h4>

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
      <a href="{{ route('inventory.create') }}" class="btn btn-primary"><span
          class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah data </a>
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
              <td><a href="{{ route('inventory.show', $inventory) }}"><strong>{{ $inventory->name }}</strong></a></td>
              <td>{{ $inventory->warehouse->name }}</td>
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
