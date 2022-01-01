@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Counselors</h5>
                    <span>Delete Counselor</span>
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.html"><i class="ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#">Counselor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delete</li>
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
       
	<div class="card">
	<div class="card-header"><h3>Delete counselor</h3></div>
	<div class="card-body">
        <p><img src="{{asset('images')}}/{{$user->image}}" class="table-user-thumb" alt="" width="200"></p>
        <p>Name: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Contact number: {{$user->contact_number}}</p>
        <p>Position: {{$user->position}}</p>
		<form class="forms-sample" action="{{route('counselor.destroy', [$user->id])}}" method="post">@csrf
			@method('DELETE')

    <div class="card-footer">
            <button type="submit" class="btn btn-danger mr-2">Confirm</button>
            <a href="{{route('counselor.index')}}" class="btn btn-light">Cancel</button>
    </div>
        </form>
	</div>
	</div>
	</div>
</div>


@endsection