@extends('layouts.core')

@section('title', 'Edit Inventaris')

@section('content')
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <form action="{{ route('inventory.update', $inventory) }}" method="post">
    @method('put')
    @csrf
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Inventaris</h5>
          </div>
          <div class="card-body">

            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label" for="name">Nama Aset</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="" required
                value="{{ $inventory->name }}" autofocus />
            </div>
            <div class="mb-3">
              <label class="form-label" for="name">Lokasi (gudang)</label>
              <select name="warehouse_id" id="warehouse_id" class="form-select">
                <option>Pilih gudang..</option>
                @foreach ($warehouses as $warehouse)
                  <option value="{{ $warehouse->id }}" @if ($warehouse->id == $inventory->warehouse->id) {{ 'selected' }} @endif>
                    {{ $warehouse->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="status">Status</label>
              <select name="status" id="status" class="form-select">
                <option value="unprocess" @if ($inventory->status == 'unprocess') selected @endif>unprocess</option>
                <option value="process" @if ($inventory->status == 'process') selected @endif>process</option>
                <option value="delay" @if ($inventory->status == 'delay') selected @endif>delay</option>
                <option value="done" @if ($inventory->status == 'done') selected @endif>done</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="price">Harga (opsional)</label>
              <input type="text" class="form-control" id="price" name="price" placeholder="" autofocus />
            </div>
            <button type="submit" class="btn btn-primary">Ubah data</button>
          </div>
        </div>
      </div>
    </div>
  </form>

@endsection
