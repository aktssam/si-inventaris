@extends('layouts.core')

@section('title', 'Tambah Aset Inventaris')

@section('content')
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <form action="{{ route('inventory.store') }}" method="POST">
    @method('post')
    @csrf
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Data Inventaris</h5>
          </div>
          <div class="card-body">

            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label" for="name">Nama Aset</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="" required
                autofocus />
            </div>
            <div class="mb-3">
              <label class="form-label" for="name">Lokasi (gudang)</label>
              <select name="warehouse_id" id="warehouse_id" class="form-select">
                <option>Pilih gudang..</option>
                @foreach ($warehouses as $warehouse)
                  <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
              </select>

            </div>
            <div class="mb-3">
              <label class="form-label" for="check_in">Tanggal Masuk <span class="text-info">(nilai default
                  sekarang)</b></label>
              <input type="datetime-local" class="form-control" id="check_in" name="check_in" placeholder="" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="check_out">Tanggal Pengambilan <span class="text-info">(opsional)</b></label>
              <input type="datetime-local" class="form-control" id="check_out" name="check_out" placeholder="" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="price">Harga <span class="text-info">(opsional)</b></label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" class="form-control" id="price" name="price" placeholder="" autofocus />
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>
      </div>
    </div>
  </form>

@endsection
