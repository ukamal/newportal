@extends('admin.master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12 m-5">
            <form action="{{ route('store-admin-profile') }}" method="post" enctype="multipart/form-data">
                @csrf 

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ $adminData->name }}">
                    @error('name')
                        <div  style="color:red;font-style:italic">{{ $message }}</div>
                    @enderror
                  </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $adminData->email }}">
                  @error('email')
                        <div  style="color:red;font-style:italic">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control" id="image" name="profile_photo_path">
                </div>
                <div class="mb-3">
                    <img src="{{ (!empty($adminData->profile_photo_path))? url('upload/adminimage/'.$adminData->profile_photo_path):url('upload/no-img.png') }}" 
                        alt="img" id="showImg">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
</div>  
    

<script type="text/javascript">
    $(document).ready(function (){
        $('#image').change(function (e){
            var reader = new FileReader();
            reader.onload = function (e){
                $('#showImg').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection