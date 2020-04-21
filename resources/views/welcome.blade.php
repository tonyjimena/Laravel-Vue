@extends('layouts.app')

@section('content')
    <example-component num={{$num ?? ''}}></example-component>
    <!-- <p>numero {{ $num ?? '' }}</p> -->
    {{-- <img src="{{storage_path('storage/app/public/images/download.png')}}"> --}}
    {{-- <img src="{{ asset('storage/images/download.png') }}" /> --}}

@endsection
