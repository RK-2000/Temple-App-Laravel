@extends('admin/layout')
@section('custom_scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
@endsection
@section('content')
    

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-border-color"></i>
        </span> User Table
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page">
            <span>Users</span>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <span>Users</span>
          </li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12">
        <span class="d-flex align-items-left purchase-popup">
          <a href="{{ route('add_user') }}" class="btn download-button purchase-button">Add Users</a>
        </span>
      </div>  
    </div>
    <div class="row">
      <div class="col-md-12">
        <table id="table_id" class="table table-bordered">
          <thead>
            <tr>
                <th id="id">ID</th>
                <th id = "email">Email</th>
                <th id = "status">Status</th>
                {{-- <th id = "created_at">Created At</th> --}}
                <th id='operation'>Operations</th>
            </tr>
          </thead>
        </table>
      </div>      
    </div>
    </div
</div>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            url: "{{route('users_list');}}",
            type: "GET",
            data: "{{route('users_list');}}"
        }
    });
} );
</script>
@endsection
