@extends('layouts.auth')
@section('content')
<div class="container text-center">
 <div class="starter-template">
     <img src="images/Aluti.jpg" height="" class="mekonsultlogo" alt="HLB Mekonsult Logo">
   <h4 style="color: #616161;font-family: arial, sans-serif;text-transform: uppercase;font-weight: bold;color: #005983;text-shadow: 1px 1px 2px rgba(150, 150,150, 0.75);">Integrity | Professionalism | Team Work | Excellence</h4>
   <p class="lead" style="font-family: arial, sans-serif;">Understanding Client's Needs and Developing Economical and Practical Business Solutions</p>
 </div>
</div>
<div class="content">
    <div class="title m-b-md">
        Timesheet System
    </div>

    <div class="links">
      @auth
        <a class="btn btn-primary" href="{{url('/admin/home')}}"><i class="fas fa-home"></i> Home</a>
      @else
        <a class="btn btn-primary" href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i> Login</a>
      @endauth
    </div>
</div>
@endsection
