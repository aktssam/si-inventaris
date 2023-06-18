@extends('layouts.core')

@section('title', 'Tambah Inventori')

@section('content')
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
    @method('post')
    @csrf
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Data Inventori</h5>
          </div>
          <div class="card-body">
            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label" for="name">Nama</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="" required
                autofocus />
            </div>

            {{-- Gudang --}}
            <div class="mb-3">
              <label class="form-label" for="warehouse_id">Gudang</label>
              <select class="form-select" name="warehouse_id" id="warehouse_id" required>
                @foreach ($warehouses as $warehouse)
                  <option value="{{ $warehouse->id }}" {{ isset($selected_warehouse_id) ? 'selected' : '' }}>
                    {{ $warehouse->name }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Price --}}
            <div class="mb-3">
              <label class="form-label" for="price">Harga (optional)</label>
              <input type="number" class="form-control" id="price" name="price" placeholder="" />
            </div>

            {{-- Tgl Masuk --}}
            <div class="mb-3">
              <label class="form-label" for="date">Tgl masuk (optional)</label>
              <input type="date" class="form-control" id="date" name="date" placeholder="" />
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>
      </div>
    </div>
  </form>

@endsection
