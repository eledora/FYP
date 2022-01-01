@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Appointment</h5>
                    <span>Create Appointment</span>
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.html"><i class="ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#">Appointment</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-10">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        @if(Session::has('errmessage'))
            <div class="alert bg-danger alert-success text-white" role="alert">
                {{Session::get('errmessage')}}
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>       
        @endforeach
    
    <form action="{{route('appointment.check')}}" method="post">@csrf    
    
    <div class="card">
        <div class="card-header">
            Choose date
            <br>
            @if(isset($date))
                    Your timetable for: 
                    {{$date}}
                @endif
        </div>
        <div class="card-body">
         <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
        <br>
        <button type="submit" class="btn btn-primary">Check</button>
        </div>
    </div>
    </form>

    @if(Route::is('appointment.check'))
    <form action="{{route('update')}}" method="post">@csrf
    <div class="card">
        <div class="card-header">
            Choose Working Hours
           <span style="margin-left: 600px">Check/Uncheck
               <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked" > 
           </span>
        </div>
        <div class="card-body"> 
            <table class="table table-striped"> 
              <tbody>
              <input type="hidden" name="appointmentId" value="{{$appointmentId}}"> 
              <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="8am" @if(isset($times)){{$times->contains('time','8am')?'checked':''}}@endif>8:00</td>
                  <td><input type="checkbox" name="time[]"  value="9am" @if(isset($times)){{$times->contains('time','9am')?'checked':''}}@endif>9:00</td>
                  <td><input type="checkbox" name="time[]"  value="10am" @if(isset($times)){{$times->contains('time','10am')?'checked':''}}@endif>10:00</td>
                </tr>
                 <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="11am" @if(isset($times)){{$times->contains('time','11am')?'checked':''}}@endif>11:00</td>
                  <td><input type="checkbox" name="time[]"  value="12pm" @if(isset($times)){{$times->contains('time','12pm')?'checked':''}}@endif>12:00</td>
                  <td><input type="checkbox" name="time[]"  value="1pm" @if(isset($times)){{$times->contains('time','1pm')?'checked':''}}@endif>13:00</td>
                </tr>
                 <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="2pm" @if(isset($times)){{$times->contains('time','2pm')?'checked':''}}@endif>14:00</td>
                  <td><input type="checkbox" name="time[]"  value="3pm" @if(isset($times)){{$times->contains('time','3pm')?'checked':''}}@endif>15:00</td>
                  <td><input type="checkbox" name="time[]"  value="4pm" @if(isset($times)){{$times->contains('time','4pm')?'checked':''}}@endif>16:00</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    </form>

</div>

@else 
<h3>Your appointment list: {{$myappointments->count()}}</h3>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Counselor</th>
              <th scope="col">Date</th>
              <th scope="col">View/Update</th>
            </tr>
          </thead>
          <tbody>
            @foreach($myappointments as $appointment)
            <tr>
              <th scope="row"></th>
              <td>{{ $appointment->counselor->name }}</td>
              <td>{{ $appointment->date }}</td>
              <td>
                <form action="{{route('appointment.check')}}" method="post">@csrf
                   <input type="hidden" name="date" value="{{$appointment->date}}">
                <button type="submit" class="btn btn-primary">View/Update</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endif

<style type="text/css">
    input[type="checkbox"]{
        zoom:1;
    }
    body{
        font-size: 13px;
    }
</style>



@endsection