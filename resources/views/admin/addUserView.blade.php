@extends('admin.layout')

@section('custom_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@endsection

@section('content')
<style>
                      body {
  margin: 0;
  padding: 2rem 1.5rem;
  font: 1rem/1.5 "PT Sans", Arial, sans-serif;
  color: #5a5a5a;
}
</style>
<script src="https://cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>

<div class="content-wrapper">
                      <div class="page-header">
                        @if(isset($data))
                        <h3 class="page-title">
                          <span class="page-title-icon bg-gradient-primary text-white mr-2">
                            <i class="mdi mdi-account-settings"></i>
                          </span> Edit User
                        </h3>
                      
                      @else
                      <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white mr-2">
                          <i class="mdi mdi-account-settings"></i>
                        </span> Add User
                      </h3>
                      @endif

                      </div>  
                                {{-- Form Template Start--}}

                                  <div class="row">

                                    <div class="col-md-12 grid-margin stretch-card">
                                      <div class="card">
                                        <div class="card-body">
                                          @if(isset($data))
                                          <form class="row  needs-validation" method="POST" action="{{route('admin.edit_data')}}" >
                                            @else
                                          <form class="row  needs-validation" method="POST" action="{{route('addUserData')}}" >
                                            @endif
                                            @csrf
                                            <div class="col-md-4">
                                              <label for="name" class="form-label">User Name</label>
                                              <input type="text" class="form-control" value="{{ $data->user_name ?? ""}}" id="name" name="user_name" required>
                                              <div class="valid-feedback">
                                                          </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <label for="email" class="form-label">Email</label>
                                                          <input type="email" class="form-control" value="{{ $data->email ?? ""}}" id="email" name="email" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <label for="mobile" class="form-label">Mobile Number</label>
                                                          <div class="input-group has-validation">
                                                            <input type="text" class="form-control" value="{{ $data->status ?? ""}}" id="mobile" name="mobile" aria-describedby="inputGroupPrepend" required>
                                                          </div>
                                                        </div>
                                                        @if(!isset($data))
                                                        <div class="col-md-4 my-4">
                                                          <label for="password" class="form-label">Password </label>
                                                          <input type="checkbox" class="m-2" onclick="myFunction()">Show Password
                                                          <input type="password" class="form-control" id="password" name="password" required>
                                                        </div>
                                                        @endif
                                                        <div class="form-group col md-2 my-4">
                                                          <label for="exampleFormControlSelect1">Add Role :</label>
                                                          <select class="form-control " value="" name="role_id" id="exampleFormControlSelect1">
                                                            @foreach ($roles as $role )
                                                            <option value="<?php echo $role['id'] ?>"><?php echo $role['name']  ?></option>
                                                            @endforeach      
                                                          </select>
                                                        </div>
                                                        <div class="form-group col md-2 my-4">
                                                          <label for="exampleFormControlSelect1">Status</label>
                                                          <select class="form-control value="{{ $data->status ?? ""}}" " name="status" id="exampleFormControlSelect1">
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                          </select>
                                                        </div>         
                                                        <div class="col-12 my-2">
                                                          <button class="btn btn-primary" type="submit">Add User</button>
                                                        </div>
                                                      </form>

                                        </div>
                                      </div>
                                    </div>
                                    
                                  </div>
                                </div>
                                {{-- Form Template  --}}



                                
                                <script>
                                  function myFunction() {
                                    var x = document.getElementById("password");
                                    if (x.type === "password") {
                                      x.type = "text";
                                    } else {
                                      x.type = "password";
                                    }
                                  }
                                  </script>

                                            @if($errors->any())
                                            <script type="text/javascript">
                                                var error = "{{$errors->first()}}";
                                                toastr.error(error);
                                            </script>
                                        @endif
                                        @if(session()->has('message'))
                                            <script type="text/javascript">
                                                var message = "{{session()->get('message')}}";
                                                toastr.success(message);
                                            </script>
                                        @endif
                                        @if (session()->has('error'))
                                            <script type="text/javascript">
                                                var error = "{{session()->get('error')}}";
                                                toastr.error(error);
                                            </script>
                                        @endif
@endsection