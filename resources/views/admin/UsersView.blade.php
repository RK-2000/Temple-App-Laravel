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
    <div class="row">
      <div class="col-12">
        <span class="d-flex align-items-left purchase-popup">
          <a href="{{ route('add_user') }}" class="btn download-button purchase-button">Add Users</a>
        </span>
      </div>
      
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table id="table_id" class="table table-bordered">
          <thead>
            <tr>
                <th id="id">ID</th>
                <th id = "name">Name</th>
                <th id = "email">Email</th>
                <th id = "role">Role</th>
                <th id='status'>Status</th>
                <th id='operation'>Operations</th>
            </tr>
          </thead>
        </table>
          </div>
        </div>
      </div>
      
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
            url: "{{route('users_list');}}",
            type: "GET",
            data: "{{route('users_list');}}"
        }
    });
} );
setTimeout(function(){ 
  $("#table_id_wrapper:eq(0)").after("<p> Hello </p>");
   }, 1000);

</script>
@endsection
