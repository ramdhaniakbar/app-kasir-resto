@extends('master');

@section('title', 'Create User')

@section('content')
<div class="page-header">
   <h3 class="page-title">Create user page</h3>
</div>
<div class="col-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Create user</h4>
         <form class="forms-sample" action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label for="inputName">Name</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" placeholder="Name" value="{{ old('name') }}">
               @error('name')
                  <span style="color: rgb(255, 71, 71);">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               <label for="inputUsername">Username</label>
               <input type="text" class="form-control @error('username') is-invalid @enderror" id="inputUsername" name="username" placeholder="Username" value="{{ old('username') }}">
               @error('username')
               <span style="color: rgb(255, 71, 71);">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               <label for="inputPassword">Password</label>
               <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" placeholder="Password">
               @error('password')
               <span style="color: rgb(255, 71, 71);">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               <label for="inputImage">Profile Image</label>
               <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="inputImage" name="profile_image">
               @error('profile_image')
               <span style="color: rgb(255, 71, 71);">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               {{-- <label for="inputRole">Role</label>
               <input type="text" class="form-control @error('role') is-invalid @enderror" id="inputRole" name="role"
                  placeholder="Role"> --}}
               <label for="selectRole">Role</label>
               <select name="role" class="form-control" id="selectRole">
                  <option value="Admin">Admin</option>
                  <option value="Kasir">Kasir</option>
                  <option value="Manager">Manager</option>
               </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2 mt-3">Submit</button>
         </form>
      </div>
   </div>
</div>
@endsection