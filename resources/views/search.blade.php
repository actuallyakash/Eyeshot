@extends('layouts.app')
@php
    $searchTerm = Request::input('q');
@endphp
@section('content')

@section('title', "$searchTerm - Search | Eyeshot ")

@include('feed/topbar')

<div class="eyeshot-container-fluid">
    <div class="eyeshot-feed text-center">
        <h3 class="mb-4 text-muted">{{ count($eyeshots) }} result{{ count($eyeshots) == 1 ? '' : 's' }} for <strong class="text-dark">{{ $searchTerm }}</strong></h3>
        <div class="row justify-content-center">
            @foreach ( $eyeshots as $eyeshot )
                @include('components/eyeshot')
            @endforeach            
        </div>
    </div>
</div>
@endsection
