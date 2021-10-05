@extends('admin/layout')

@section('content')


{{-- @foreach ($data as $d )
                     {{$d}} 
@endforeach --}}


<div class="content-wrapper">
                      <div class="page-header">
                        <h3 class="page-title">
                          <span class="page-title-icon bg-gradient-primary text-white mr-2">
                            <i class="mdi mdi-border-color"></i>
                          </span> Edit User
                        </h3>
                      
                      </div>
                    
                    
                    {{-- FORM START --}}
                    
                    <form class="row  needs-validation" method="POST" action="{{route('admin.edit_data')}}"  >
                      @csrf
                      <div class="col-md-4">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="name" name="user_name" value="{{$data->user_name}}" required>
                        <div class="valid-feedback">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}" required>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="mobile" class="form-label">Mobile Number</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="mobile" name="mobile"  value="{{$data->mobile}}"aria-describedby="inputGroupPrepend" required>
                                    </div>
                                  </div>
                                  <div class="form-group col md-2 my-4">
                                    <label for="exampleFormControlSelect1">Add Role :</label>
                                    <select class="form-control " name="role_id" id="exampleFormControlSelect1">
                                      @foreach ($roles as $role )
                                      <option value="<?php echo $role['id'] ?>"><?php echo $role['name']  ?></option>
                                      @endforeach      
                                    </select>
                                  </div>
                                  <input type="hidden" value="{{$data->id}}" name="id">
                                  <div class="form-group col md-2 my-4">
                                    <label for="exampleFormControlSelect1">Status</label>
                                    <select class="form-control " name="status" value="{{$data->status}}" id="exampleFormControlSelect1">
                                      <option value="1">Active</option>
                                      <option value="0">Inactive</option>
                                    </select>
                                  </div>         
                                  <div class="col-12 my-2">
                                    <button class="btn btn-primary" type="submit">Add User</button>
                                  </div>
                                </form>



@endsection