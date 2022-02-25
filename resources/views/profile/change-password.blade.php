@extends('master');

@section('title', 'Change Password')

@section('content')
<div class="page-header">
   <h3 class="page-title">Change Password page</h3>
</div>
<div class="col-12">
   @if (session('success'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session ('success') }}
   </div>
   @endif
   @if (session('danger'))
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session ('danger') }}
   </div>
   @endif
</div>
<div class="col-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Change password</h4>
         <form class="forms-sample" action="{{ route('change.password.update') }}" method="POST">
            @csrf
            <div class="form-group">
               <label for="current_password">Current Password</label>
               <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                  id="current_password" name="current_password" placeholder="Current Password">
               <i class="bi bi-eye" id="hide_current" onclick="currentPassword()"
                  style="position: absolute; right: 4%; top: 26%; cursor: pointer;"></i>
               <i class="bi bi-eye-slash" id="show_current" onclick="currentPassword()"
                  style="position: absolute; right: 4%; top: 26%; cursor: pointer;"></i>
               @error('current_password')
               <span style="color: red;">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               <label for="new_password">New Password</label>
               <input type="password" class="form-control @error('password') is-invalid @enderror" id="new_password"
                  name="password" placeholder="New Password">
               <i class="bi bi-eye" id="hide_new" onclick="newPassword()"
                  style="position: absolute; right: 4%; top: 46%; cursor: pointer;"></i>
               <i class="bi bi-eye-slash" id="show_new" onclick="newPassword()"
                  style="position: absolute; right: 4%; top: 46%; cursor: pointer;"></i>
               @error('password')
               <span style="color: red;">{{ $message }}</span>
               @enderror
            </div>
            <div class="form-group">
               <label for="confirm_password">Confirm Password</label>
               <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                  id="confirm_password" name="password_confirmation" placeholder="Confirm Password">
               <i class="bi bi-eye" id="hide_confirm" onclick="confirmPassword()"
                  style="position: absolute; right: 4%; top: 66%; cursor: pointer;"></i>
               <i class="bi bi-eye-slash" id="show_confirm" onclick="confirmPassword()"
                  style="position: absolute; right: 4%; top: 66%; cursor: pointer;"></i>
               @error('password_confirmation')
               <span style="color: red;">{{ $message }}</span>
               @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2 mt-3">Submit</button>
         </form>
      </div>
   </div>
</div>
@endsection
@section('show-password')
<script>
   function currentPassword() {
         var x = document.getElementById('current_password');
         if (x.type === 'password') {
            x.type = 'text';
            document.getElementById('hide_current').style.display = 'inline-block';
            document.getElementById('show_current').style.display = 'none';
         } else {
            x.type = 'password';
            document.getElementById('hide_current').style.display = 'none';
            document.getElementById('show_current').style.display = 'inline-block';
         }
      }

      function newPassword() {
         var y = document.getElementById('new_password');
         if (y.type === 'password') {
            y.type = 'text';
            document.getElementById('hide_new').style.display = 'inline-block';
            document.getElementById('show_new').style.display = 'none';
         } else {
            y.type = 'password';
            document.getElementById('hide_new').style.display = 'none';
            document.getElementById('show_new').style.display = 'inline-block';
         }
      }

      function confirmPassword() {
         var z = document.getElementById('confirm_password');
         if (z.type === 'password') {
            z.type = 'text';
            document.getElementById('hide_confirm').style.display = 'inline-block';
            document.getElementById('show_confirm').style.display = 'none';
         } else {
            z.type = 'password';
            document.getElementById('hide_confirm').style.display = 'none';
            document.getElementById('show_confirm').style.display = 'inline-block';
         }
      }
</script>
@endsection