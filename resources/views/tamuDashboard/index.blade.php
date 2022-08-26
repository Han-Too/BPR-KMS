@extends('tamuDashboard.layouts.main')

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
	<table>
		<tr>
        <th><p id="clock"></p></th>
		<th><div class="jam_analog_malasngoding">
			<div class="xxx">
				<div class="jarum jarum_detik"></div>
				<div class="jarum jarum_menit"></div>
				<div class="jarum jarum_jam"></div>
				<div class="lingkaran_tengah"></div>
			</div>
		</div></th>
	</tr>
	</table>
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
    <h4 class="text-center">di Web KMS BPR</h4><br>
	<h5 class="text-center bg-dark text-light">Tamu</h5>

	<style type="text/css">
 
		h1,h2,p,a{
			font-family: sans-serif;
			font-weight: normal;
		}
	 
		.jam_analog_malasngoding {
			/* background: #f3fbcf; */
			background-image: linear-gradient(#2b32b2, #289df1,#fff);
			position: relative;
			width: 200px;
			height: 200px;
			border: 16px solid #52b6f0;
			border-radius: 20%;
			padding: 20px;
			margin:20px auto;
		}
	 
		.xxx {
			height: 100%;
			width: 100%;
			position: relative;
		}
	 
		.jarum {
			position: absolute;
			width: 50%;
			background: #fc3a3a;
			top: 50%;
			transform: rotate(90deg);
			transform-origin: 100%;
			transition: all 0.05s cubic-bezier(0.1, 2.7, 0.58, 1);
		}
	 
		.lingkaran_tengah {
			width: 24px;
			height: 24px;
			background: #18036c;
			border: 4px solid #fc3a3a;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-left: -14px;
			margin-top: -14px;
			border-radius: 50%;
		}
	 
		.jarum_detik {
			height: 2px;
			border-radius: 1px;
			background: #F0C952;
		}
	 
		.jarum_menit {
			height: 4px;
			border-radius: 4px;
		}
	 
		.jarum_jam {
			height: 8px;
			border-radius: 4px;
			width: 35%;
			left: 15%;
		}
	</style>
	 
	 
	
	 
	 
	<script type="text/javascript">
		const secondHand = document.querySelector('.jarum_detik');
		const minuteHand = document.querySelector('.jarum_menit');
		const jarum_jam = document.querySelector('.jarum_jam');
	 
		function setDate(){
			const now = new Date();
	 
			const seconds = now.getSeconds();
			const secondsDegrees = ((seconds / 60) * 360) + 90;
			secondHand.style.transform = `rotate(${secondsDegrees}deg)`;
			if (secondsDegrees === 90) {
				secondHand.style.transition = 'none';
			} else if (secondsDegrees >= 91) {
				secondHand.style.transition = 'all 0.05s cubic-bezier(0.1, 2.7, 0.58, 1)'
			}
	 
			const minutes = now.getMinutes();
			const minutesDegrees = ((minutes / 60) * 360) + 90;
			minuteHand.style.transform = `rotate(${minutesDegrees}deg)`;
	 
			const hours = now.getHours();
			const hoursDegrees = ((hours / 12) * 360) + 90;
			jarum_jam.style.transform = `rotate(${hoursDegrees}deg)`;
		}
	 
		setInterval(setDate, 1000)
	</script>
</div>

@endsection