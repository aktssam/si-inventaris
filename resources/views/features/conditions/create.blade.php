@extends('layouts.core')

@section('title', 'Tambah Kondisi Aset')

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
            <h5 class="mb-0">Tambah Kondisi Aset</h5>
            {{-- <p class="mb-0">{{ $i }}</p> --}}
          </div>
          <div class="card-body">

            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label" for="name">Uraian</label>
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
