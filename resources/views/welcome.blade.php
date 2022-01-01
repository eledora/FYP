@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <img src="\banner\unik-removebg.png" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Student Wellfare and Counseling Unit</h2>
            <p>Login to make a counseling appointment with us now.</p>
            <div class="mt-3">
                <a href="{{url('/register')}}"> <button class="btn btn-success">Register</button></a>
                <a href="{{url('/login')}}"><button class="btn btn-secondary">Login</button></a>
            </div>
        </div>
    </div>
</div>

<!--Search counselor-->
<form action="{{url('/')}}" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-header">Find Counselors</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <input type="date" name="date" class="form-control" id="datepicker">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit">Find counselors</button>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</form>

@endsection
