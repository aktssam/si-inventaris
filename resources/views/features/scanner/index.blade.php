@extends('layouts.core')

@section('title', 'Dashboard')

@section('content')

  <h4 class="fw-bold mb-4">Scanner</h4>

  <div class="col-md-6 mx-auto" id="reader" width="600px"></div>

@endsection

@section('scripts')
  {{-- <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script> --}}
  <script src="{{ asset('assets/js/html5-qrcode.min.js') }}" type="text/javascript"></script>
  <script>
    function onScanSuccess(decodedText, decodedResult) {
      console.log(`Code matched = ${decodedText}`, decodedResult);
      return window.location = `{{ URL::to('/${decodedText}') }}`;
    }

    function onScanFailure(error) {
      console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
      "reader", {
        fps: 10,
        qrbox: {
          width: 300,
          height: 300
        }
      },
      /* verbose= */
      false);

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
  </script>

@endsection
