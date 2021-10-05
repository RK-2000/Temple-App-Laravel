@extends('admin/layout')
@section('title')
  Add User
@endsection


@section('content')

<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-border-color"></i>
      </span> Add User
    </h3>
  
  </div>


{{-- FORM START --}}

<form class="row  needs-validation" >
  @csrf
  <div class="col-md-4">
    <label for="name" class="form-label">User Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
    <div class="valid-feedback">
      Looks good!
                </div>
              </div>
              <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="col-md-4">
                <label for="mobile" class="form-label">Mobile Number</label>
                <div class="input-group has-validation">
                  <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="inputGroupPrepend" required>
                </div>
              </div>
              <div class="col-md-4 my-4">
                <label for="password" class="form-label">Password </label>
                <input type="checkbox" class="m-2" onclick="myFunction()">Show Password
                {{-- <label for="password" class="form-label"> )</label> --}}
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
                        

    
              <div class="form-group col md-2 my-4">
                <label for="exampleFormControlSelect1">Add Role :</label>
                <select class="form-control " id="exampleFormControlSelect1">
                  <option value="1">Priest</option>
                  <option value="2">Bhakt</option>
                  <option value="3">Guru</option>
                  <option value="4">Pujari</option>
                  <option value="5">Entrepeneur</option>
                </select>
              </div>
              <div class="form-group col md-2 my-4">
                <label for="exampleFormControlSelect1">Status</label>
                <select class="form-control " id="exampleFormControlSelect1">
                  <option value="1">Priest</option>
                  <option value="2">Bhakt</option>
                  <option value="3">Guru</option>
                  <option value="4">Pujari</option>
                  <option value="5">Entrepeneur</option>
                </select>
              </div>         
              <div class="col-12 my-2">
                <button class="btn btn-primary" type="submit">Add User</button>
              </div>
            </form>
{{-- FORM END --}}
@endsection

@section('script')
 
  
      function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }
      }
@endsection