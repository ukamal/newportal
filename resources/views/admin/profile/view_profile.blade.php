@extends('admin.master')
@section('admin')


<div class="container m-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="width: 18rem;">
    
          <img src="{{ (!empty($adminData->profile_photo_path))? url('upload/adminimage/'.$adminData->profile_photo_path):url('upload/no-img.png') }}" alt="img">
          
            <div class="card-body">
              <h5 class="card-title">{{ $adminData->name }}</h5>
              <p class="card-text">{{ $adminData->email }}</p>
              <a href="{{ route('edit-admin-profile') }}" class="btn btn-primary">Edit Profile</a>
            </div>
            
          </div>
      </div>
    </div>
  </div>
  



@endsection