@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid px-4">
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="mt-4">Selamat Datang,</h1>
    <h4>{{ Auth::user()->name }}</h4>
</div>

@endsection