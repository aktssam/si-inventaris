@extends('layouts.core')

@section('title', 'Gudang')

@section('content')
  <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Data Master /</span> Gudang</h4>

  @if (session('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
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

  <div class="d-flex justify-content-between mb-4">
    <a href="{{ route('warehouse.create') }}" class="btn btn-primary">
      <span class="tf-icons bx bx-plus-circle"></span>
      &nbsp; Tambah data gudang
    </a>

    <a class="btn btn-outline-primary" href="{{ route('print.warehouse.all') }}" target="_blank">
      <span><i class="menu-icon tf-icons bx bx-printer"></i></span>
      Cetak PDF
    </a>
  </div>

  <div class="row">
    @foreach ($warehouses as $warehouse)
      <div class="col-md-4 mb-3">
        <a href="{{ route('warehouse.show', $warehouse) }}">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-data"></i></span>
                </div>
              </div>
              <h5 class="d-block">
                {{ $warehouse->name }}
              </h5>
              <h6 class="text-nowrap my-1">{{ $warehouse->inventories->count() }} aset</h6>
            </div>
          </div>
        </a>
      </div>
    @endforeach

  </div>

@endsection
