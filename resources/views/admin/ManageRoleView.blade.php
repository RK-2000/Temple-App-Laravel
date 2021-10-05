@extends('admin/layout')
@section('custom_scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

@endsection
@section('content')
    

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-border-color"></i>
        </span> Manage Roles
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page">
            <span>Master</span>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <span>Manage Roles</span>
          </li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12">
        <span class="d-flex align-items-left purchase-popup">
          <a href="{{ route('add_role') }}" class="btn download-button purchase-button">Add Roles</a>
        </span>
      </div>  
    </div>
    <div class="row">
      <div class="col-md-12">
        <table id="table_id" class="table table-bordered">
          <thead>
            <tr>
                <th id="id">ID</th>
                <th id = "role-name">Role Name</th>
                <th id = "status">Status</th>
                <th id = "created_data_time">Created At</th>
                <th id = "operations">Operations</th>
            </tr>
          </thead>
        </table>
      </div>      
    </div>
  </div
</div>
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
<script>
  $(document).ready( function () {
    $('#table_id').DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            url: "{{route('manage_role');}}",
            type: "GET",
            data: "{{route('manage_role');}}"
        }
    });
} );
</script>
@endsection
