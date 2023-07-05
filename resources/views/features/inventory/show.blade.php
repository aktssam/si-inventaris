@extends('layouts.core')

@section('title', "Detail | $inventory->name")

@section('content')

  <div class="row">
    <div class="col-md-3 mb-3">
      <a href="{{ route('inventory.index') }}" class="btn btn-link">↩ Kembali</a>
    </div>
  </div>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="row">
    <div class="col-md-3">
      <div class="card shadow mb-4 p-3 d-flex align-items-center">
        {{ QrCode::size(200)->generate("inventory/{$inventory->id}") }}
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-4 px-3 py-3">
        <div class="card-header py-3">
          <h3 class="card-title mb-0">Deskripsi</h3>
        </div>
        <div class=" card-body table-responsive text-nowrap">
          <table class="table table-bordered">
            <tbody class="table-border-bottom-0" id="table_kendaraan">
              {{-- <tr>
                <td style="width: 1px;"><strong>UID</strong></td>
                <td>{{ $inventory->uid }}</td>
              </tr> --}}
              <tr>
                <td style="width: 1px;"><strong>Nama</strong></td>
                <td>{{ $inventory->name }}</td>
              </tr>
              <tr>
                <td><strong>Gudang</strong></td>
                <td>{{ $inventory->warehouse->name }}</td>
              </tr>
              <tr>
                <td><strong>Tgl masuk</strong></td>
                <td>{{ $inventory->check_in }}</td>
              </tr>
              <tr>
                <td><strong>Status</strong></td>
                <td>
                  <button data-bs-toggle="modal" data-bs-target="#modalCenter"
                    class="badge
                    @if ($inventory->status == 'unprocess') bg-secondary
                    @elseif ($inventory->status == 'delay') bg-warning
                    @elseif ($inventory->status == 'done') bg-success
                    @else bg-primary @endif
                ">
                    {{ $inventory->status }}
                  </button>
                </td>
              </tr>
              <tr>
                <td><strong>Harga</strong></td>
                <td>Rp{{ $inventory->price ?? 0 }}</td>
              </tr>
            </tbody>
          </table>
          <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Set status</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('inventory.update', $inventory) }}" method="post">
                  @method('put')
                  @csrf
                  <div class="modal-body">
                    <div class="row">
                      {{-- Nama --}}
                      <div class="mb-3">
                        <label class="form-label" for="description">Status</label>
                        <select name="status" id="status" class="form-select">
                          <option value="unprocess" @if ($inventory->status == 'unprocess') selected @endif>unprocess</option>
                          <option value="process" @if ($inventory->status == 'process') selected @endif>process</option>
                          <option value="delay" @if ($inventory->status == 'delay') selected @endif>delay</option>
                          <option value="done" @if ($inventory->status == 'done') selected @endif>done</option>
                        </select>
                        <input type="hidden" name="warehouse_id" id="warehouse_id"
                          value="{{ $inventory->warehouse->id }}">
                        <input type="hidden" name="name" id="name" value="{{ $inventory->name }}">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Close
                    </a>
                    <button type="submit" class="btn btn-primary" target="_blank">Ubah Status</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card mb-4">
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-disabled">
            Opsi
          </li>
          <li class="list-group-item dropdown-item">
            <a href="{{ route('print.inventory', $inventory) }}" target="_blank"><span><i
                  class="bx bx-printer"></i></span>
              &nbsp;&nbsp;Cetak
            </a>
          </li>
          <li class="list-group-item dropdown-item">
            <a href="{{ route('inventory.edit', $inventory) }}"><span><i class="bx bx-edit"></i></span>&nbsp;&nbsp;
              Edit data</a>
          </li>
          <li class="list-group-item dropdown-item">
            <form action="{{ route('inventory.destroy', $inventory) }}" method="POST">
              @method('DELETE')
              @csrf
              <Button class="btn btn-link text-danger m-0 p-0" onclick="return confirm('Apakah anda yakin?')">
                <span><i class="bx bx-trash"></i></span>&nbsp;&nbsp; Hapus data
              </Button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="card mb-4 px-3 py-3">
    <div class="card-header py-3">
      <h3 class="card-title mb-0">Kondisi aset</h3>
      <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#modalCenter">
        <i class="tf-icons bx bx-plus-circle"></i>
        &nbsp; Tambah kondisi
      </button>
      <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Tambah Kondisi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('conditions.store') }}" method="post">
              @method('post')
              @csrf
              <div class="modal-body">
                <div class="row">
                  {{-- Nama --}}
                  <div class="mb-3">
                    <label class="form-label" for="description">Uraian</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder=""
                      required autofocus />
                    <input type="hidden" name="inventory_id" id="inventory_id" value="{{ $inventory->id }}">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  Close
                </a>
                <button type="submit" class="btn btn-primary" target="_blank">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Uraian</th>
            <th style="width: 1px;">Tanggal</th>
            <th style="width: 1px;">Waktu</th>
            {{-- <th class="d-flex justify-content-end">Opsi</th> --}}
          </tr>
        </thead>
        @foreach ($conditions as $condition)
          <tbody class="table-border-bottom-0" id="table_kendaraan">
            <td>{{ $condition->description }}</td>
            <td>{{ $condition->created_at->format('d/m/Y') }}</td>
            <td>{{ $condition->created_at->format('H:i') }}</td>
            {{-- <td style="width: 1px;">
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
            </td> --}}
          </tbody>
        @endforeach
      </table>
    </div>
  </div>
@endsection
