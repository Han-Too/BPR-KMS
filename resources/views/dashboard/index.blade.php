@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid px-4">
    <h1 class="mt-4">Selamat Datang,</h1>
    <h4>{{ Auth::user()->name }}</h4>
</div>

@endsection