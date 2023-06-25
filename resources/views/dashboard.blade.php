@extends('layouts.core')

@section('title', 'Dashboard')

@section('content')
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Welcome, {{ Auth::user()->name }} 👋</h5>
              <p class="mb-4">
                Selamat datang di <span class="fw-bold">Inventory</span>, Aplikasi untuk manajemen inventori dan gudang
              </p>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-3">
              <img src="./assets/img/illustrations/man-with-laptop-light.png" height="132" alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3 col-md-6 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <a href="{{ route('inventory.index') }}">
                <span class="avatar-initial rounded bg-label-primary">
                  <i class="bx bx-data"></i>
                </span>
              </a>
            </div>
          </div>
          <span class="d-block">Inventaris</span>
          <h3 class="card-title text-nowrap my-1">{{ $inventories->count() ?? 0 }}</h3>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <a href="{{ route('warehouse.index') }}">
                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-package"></i></span></a>
            </div>
          </div>
          <span class="d-block">Gudang</span>
          <h3 class="card-title text-nowrap my-1">{{ $warehouses->count() ?? 0 }}</h3>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <a href="{{ route('history.index') }}">
                <span class="avatar-initial rounded bg-label-warning">
                  <i class="bx bx-history"></i>
                </span>
              </a>
            </div>
          </div>
          <span class="d-block">History</span>
          <h3 class="card-title text-nowrap my-1">0</h3>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <a href="#">
                <span class="avatar-initial rounded bg-label-success"><i class="bx bx-qr"></i></span>
              </a>
            </div>
          </div>
          <span class="d-block">QR code</span>
          <h3 class="card-title text-nowrap my-1">
            <a href="{{ route('dashboard.scanner') }}" class="btn btn-sm btn-success">Scan now</a>
          </h3>
        </div>
      </div>
    </div>
  </div>

@endsection
