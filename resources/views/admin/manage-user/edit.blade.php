@section('title', 'Update user')

@extends('admin.layouts.app')

@section('content')
	<div class="container-fluid">
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h1 class="m-0 font-weight-bold text-primary">Update - {{$data->email}}</h1>
			</div>
		</div>
        @session('message')
        <div class="alert alert-warning">
            {{ session('message') }}
        </div>
        @endsession
        
        <div class="p-2">
            <form  action="{{route('user.update', $data->id)}}" id="productForm" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
                   
                    <div class="col-sm-6 mb-3 mb-sm-4">
                        <label for="handle">Name:</label>
                        <input type="text" class="form-control form-control-user" name="name" id="name" value="{{$data->name}}"  disabled>
                        <p></p>
                        
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-4">
                        <label for="page_title">Email:</label>
                        <input type="email" class="form-control form-control-user" name="email" id="email" value="{{$data->email}}" disabled>
                        <p></p>
                    </div>
                   
                    <div class="col-sm-6 mb-3 row">
                        <label for="nameType" class="col-sm-3 col-form-label">Active:</label>
                            <select name="active" id="active" class="select-form">
                                <option value="1" @if ($data->active == 1) selected @endif>Active</option>
                                <option value="0" @if ($data->active == 0) selected @endif>Non-Active</option>
                            </select>
                    </div>
                   
                    <div class="form-group row col-sm-4 mb-3">
                        <label for="nameType" class="col-sm-3 col-form-label ">Role:</label>
                        @if ($data->role == 2)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="admin" value="2" @if ($data->role == 2) checked @endif>
                                <label class="form-check-label" for="admin">
                                    Admin
                                </label>
                            </div>
                        @else
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="user" value="1" @if ($data->role == 1) checked @endif>
                                <label class="form-check-label" for="user">
                                    User
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="admin" value="2" @if ($data->role == 2) checked @endif>
                                <label class="form-check-label" for="admin">
                                    Admin
                                </label>
                            </div>
                        @endif
                    </div>
                </div>
              

                <div class="row mt-5">
                    <div class="col-lg-1">
                        <label for="nameType" >Avatar:</label>
                    </div>
                    @if ($data->avatar)
                        <div class="col-lg-6 cart">
                            <img src="{{ Storage::url($data->avatar) }}" width="200">
                        </div>
                    @endif
                    <p>No Photo</p>
                </div>

                
                <button type="submit" class="btn btn-primary btn-user btn-block mt-4">Update product</button>
            </form>
        </div>
	</div>

@endsection


