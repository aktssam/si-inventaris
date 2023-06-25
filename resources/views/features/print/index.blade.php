@extends('layouts.core')

@section('title', 'Gudang')

@section('content')
  <h4 class="fw-bold py-3 mb-2">Export & Print</h4>

  <div class="row">
    {{-- Card 1 --}}
    <div class=" col-md-4 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <a href="{{ route('print.inventory') }}">
                <span class="avatar-initial rounded bg-label-primary">
                  <i class="bx bx-printer"></i>
                </span>
              </a>
            </div>
          </div>
          <h5 class="fw-bold">Cetak Data Inventaris</h5>
          <span>Semua data</span>
        </div>
      </div>
    </div>

    {{-- Card 2 --}}
    <div class=" col-md-4 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <button data-bs-toggle="modal" data-bs-target="#modalCenter">
                <span class="avatar-initial rounded bg-label-primary">
                  <i class="bx bx-printer"></i>
                </span>
              </button>
            </div>
          </div>
          <h5 class="fw-bold">Cetak Data Inventaris</h5>
          <span>Inventaris per-gudang</span>
        </div>
      </div>
      <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Cetak data per-gudang</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('print.warehouse.modal') }}" method="post">
              @method('post')
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-3">
                    <label for="warehouse_id" class="form-label">Pilih data gudang</label>
                    <select name="warehouse_id" id="warehouse_id" class="form-select">
                      @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  Close
                </a>
                <button type="submit" class="btn btn-primary">Cetak</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- Card 3 --}}
    <div class="col-md-4 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <a href="{{ route('print.warehouse.all') }}">
                <span class="avatar-initial rounded bg-label-primary">
                  <i class="bx bx-printer"></i>
                </span>
              </a>
            </div>
          </div>
          <h5 class="fw-bold">Cetak Data Gudang</h5>
          <span>inventaris semua gudang</span>
        </div>
      </div>
    </div>

  </div>

@endsection
