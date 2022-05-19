@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid px-4 ">
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    

    {{-- DISINI JAM --}}
<div>
        <p id="clock"></p>
	<script>
	   setInterval(customClock, 500);
	   function customClock() {
	       var time = new Date();
	       var hrs = time.getHours();
	       var min = time.getMinutes();
	       var sec = time.getSeconds();
	       
	       document.getElementById('clock').innerHTML = hrs + ":" + min + ":" + sec;
	       
	   }
	   
	</script>
</div>

<h1 class="mt-4 text-center">Selamat Datang,</h1>
    <h4 class="text-center">{{ Auth::user()->name }}</h4><br>
	<h5 class="text-center bg-dark text-light">{{ Auth::user()->role }}</h5>


</div>

@endsection