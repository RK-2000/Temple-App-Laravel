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
        </span> Manage Prasad
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page">
            <span>Master</span>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <span>Manage Prasad</span>
          </li>
        </ol>
      </nav>
    </div>
    <div class="row">

      {{-- Add Model --}}
        <div class="modal fade" id="prasad-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Prasad</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="{{ route('prshad_type_post')}}">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Prasad Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Prasad Name" required> 
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Prasad Status</label>
                    <select class="form-control" id="prasad-type" name="status" required>
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
      {{-- End of Add Model  --}}
        <div class="col-12">
          <span class="d-flex align-items-left purchase-popup">
            <button data-toggle="modal" data-target="#prasad-modal" class="btn download-button purchase-button">Add Prasad</button>
          </span>
        </div>  
    </div>

    <div class="row">
      {{-- Update Model --}}
      
      @if(isset($prasad))
      <div class="modal fade" id="update-prasad-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Prasad</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{ route('update_prashad_type')}}">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Prasad Name</label>
                  <input type="hidden" name="prasad_types_id" value="{{$prasad->prasad_types_id }}" type="hidden" required> 
                  <input type="text" value="{{$prasad->name}}" class="form-control" name="name" placeholder="Prasad Name" required> 
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Prasad Status</label>
                  <select class="form-control" id="prasad-type" name="status" required>
                    <option value="1" <?php 
                    if($prasad->status == 1){
                      echo "selected";
                    }
                  ?>  >Active</option>
                    <option value="0" <?php 
                    if($prasad->status == 0){
                      echo "selected";
                    }
                  ?>>Inactive</option>
                    
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
      @endif
    </div>
    {{-- End of Update Model  --}}
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
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
  </div>

  </div>
  <!-- content-wrapper ends -->
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
    
    <?php 
      if(isset($_GET['prasad_id'])){
    ?>
        $('#update-prasad-modal').modal('show');
    <?php
      }
    ?>
    
    $('#table_id').DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            url: "{{route('prshad_type');}}",
            type: "GET",
            data: "{{route('prshad_type');}}"
        }
    });
} );
</script>
@endsection