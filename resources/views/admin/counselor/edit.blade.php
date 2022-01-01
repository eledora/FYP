@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Counselors</h5>
                    <span>Edit Counselor</span>
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
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
	<div class="card-header"><h3>Edit counselor</h3></div>
	<div class="card-body">
		<form class="forms-sample" action="{{route('counselor.update', [$user->id])}}" method="post" enctype="multipart/form-data" >@csrf
		@method('PUT')
        <div class="row">
				<div class="col-lg-6">
					<label for="">Full name</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="counselor name" value="{{$user->name}}">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
        
                <div class="col-lg-6">
                    <label for="">Gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{$user->gender}}">
                            @foreach(['male','female'] as $gender)
                            <option value="{{ $gender }}" @if($user->gender==$gender)selected @endif>{{ $gender }}</option>
                            @endforeach
                        </select>

                     @error('gender')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
			</div>

			<div class="row">
                <div class="col-lg-6">
					<label for="">Email</label>
					<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{$user->email}}">
                     @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
                <div class="col-md-6">
                    <label for="">Contact number</label>
                        <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" placeholder="contact number" value="{{$user->contact_number}}">
                        @error('contact_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
			</div>
            <div class="row">
                <div class="col-lg-6">
						<label for="">Position</label>
						<input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="position" value="{{$user->position}}">
                         @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
                <div class="col-md-6">
                        <label>Role</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="">Please select role</option>
                            @foreach(App\Models\Role::get() as $role)
                                <option value="{{$role->id}}" @if($user->role_id==$role->id)selected @endif>{{$role->name}}</option>
                            @endforeach
                            
                        </select>
                         @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row">
            	<div class="col-md-6">
                    <div class="form-group">
                        <label>Image</label>
                            <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                            <span class="input-group-append">
                            </span>
                    @error('image')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>   
                <div class="col-lg-6">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="counselor password">
                     @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div> 
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
		</form>
	</div>
	</div>
	</div>
</div>


@endsection