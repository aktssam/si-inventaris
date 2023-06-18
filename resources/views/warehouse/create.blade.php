@extends('layouts.core')

@section('title', 'Tambah Gudang')

@section('content')
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <form action="{{ route('warehouse.store') }}" method="POST" enctype="multipart/form-data">
    @method('post')
    @csrf
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Data Gudang</h5>
          </div>
          <div class="card-body">

            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label" for="name">Nama gudang</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="" required
                autofocus />
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>
      </div>
    </div>
  </form>

@endsection
