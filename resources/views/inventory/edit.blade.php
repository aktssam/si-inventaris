@extends('layouts.core')

@section('title', 'Edit Inventori')

@section('content')
  <form action="{{ route('inventory.update', $inventory) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Data Inventory</h5>
          </div>
          <div class="card-body">

            {{-- NOPOL --}}
            <div class="mb-3">
              <label class="form-label" for="name">Nama</label>
              <input type="text" class="form-control" id="name" name="name" placeholder=""
                value="{{ $inventory->name }}" required autofocus />
            </div>

            {{-- Gudang --}}
            <div class="mb-3">
              <label class="form-label" for="warehouse_id">Gudang</label>
              <select class="form-select" name="warehouse_id" id="warehouse_id" required>
                @foreach ($warehouses as $warehouse)
                  <option value="{{ $warehouse->id }}"
                    {{ $inventory->warehouse->id === $warehouse->id ? 'selected' : '' }}>
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

            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>
      </div>

    </div>
  </form>

@endsection
