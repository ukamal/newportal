@extends('admin.master')
@section('admin')
    
<div class="container">
    <div class="ror">
        <div class="col-md-12">
            <h1>Change Password</h1>
            <form action="{{ route('admin-update-password') }}" method="post">
                @csrf 
            
                <div class="mb-3">
                    <label for="name" class="form-label">Current Password</label>
                    <input id="oldpassword" type="password" class="form-control" name="oldpassword" aria-describedby="name">
                    @error('oldpassword')
                        <div style="color:red;font-style:italic">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                  <label for="email" class="form-label">New Password</label>
                  <input id="password" type="password" class="form-control" name="password" aria-describedby="emailHelp">
                  @error('password')
                    <div  style="color:red;font-style:italic">{{ $message }}</div>
                  @enderror
                </div>
            
                <div class="mb-3">
                    <label for="email" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" aria-describedby="emailHelp">
                    @error('password')
                    <div  style="color:red;font-style:italic">{{ $message }}</div>
                    @enderror
                  </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
</div>


@endsection