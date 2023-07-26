@extends('layouts.core')

@section('title', 'History')

@section('content')

  @php
    use Carbon\Carbon;
    Carbon::setLocale('id_ID');
  @endphp

  <div class="col-md-8">
    <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Data Master /</span> History</h4>
  </div>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session('warning'))
    <div class="alert alert-primary alert-dismissible" role="alert">
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

  <div class="card">
    <div class="card-header">
      @if (count($histories) < 1)
        <div class="d-flex text-center text-disable">tidak ada history</div>
      @else
        <form action="{{ route('history.delete.all') }}" method="POST">
          @method('delete')
          @csrf
          <button
            class="btn btn-sm btn-outline-danger"onclick="return confirm('Semua data histori akan dihapus dan tidak dapat dikembalikan, melanjutkan?')">
            <i class="bx bx-trash"></i><span>delete all</span>
          </button>
        </form>
    </div>

    <table class="table table-striped">
      <div class="table table-responsive text-nowrap">

        <tbody class="table-border-bottom-0" id="table_kendaraan">
          @foreach ($histories as $history)
            <tr>
              <td style="width: 1px">❇️</td>
              <td><a href="{{ $history->redirect_link ?? '#' }}">{{ $history->description }}</a></td>
              <td>by {{ $history->user->name }}</td>
              <td style="width: auto">{{ $history->updated_at->diffForHumans() }}</td>
            </tr>
          @endforeach

        </tbody>
    </table>
    @endif
  </div>
  </div>
@endsection
