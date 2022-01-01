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
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>       
        @endforeach
    
    <form action="{{route('appointment.store')}}" method="post">@csrf    
    
    <div class="card">
        <div class="card-header">
            Choose date
        </div>
        <div class="card-body">
         <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
        </div>
    </div>

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
                <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="8am">8:00</td>
                  <td><input type="checkbox" name="time[]"  value="9am">9:00</td>
                  <td><input type="checkbox" name="time[]"  value="10am">10:00</td>
                </tr>
                 <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="11am">11:00</td>
                  <td><input type="checkbox" name="time[]"  value="12pm">12:00</td>
                  <td><input type="checkbox" name="time[]"  value="1pm">13:00</td>
                </tr>
                 <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="2pm">14:00</td>
                  <td><input type="checkbox" name="time[]"  value="3pm">15:00</td>
                  <td><input type="checkbox" name="time[]"  value="4pm">16:00</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>

</div>

<style type="text/css">
    input[type="checkbox"]{
        zoom:1;
    }
    body{
        font-size: 13px;
    }
</style>



@endsection