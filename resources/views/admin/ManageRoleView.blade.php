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
      {{-- add Role --}}

        {{-- Modal For Add Role --}}
        <div class="modal fade" id="role-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="{{ route('admin.addRole.post') }}">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role Name</label>
                    <input type="text" class="form-control" name="role-name" placeholder="Role Name" required> 
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Role Type Status</label>
                    <select class="form-control" id="role-type" name="role-status" required>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="Submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- End Modal --}}
        {{-- Button for add roles --}}
        <div class="col-12">
          <span class="d-flex align-items-left purchase-popup">
            <button data-toggle="modal" data-target="#role-modal" class="btn download-button purchase-button">Add Roles</button>
          </span>
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
  </div>
</div>
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
