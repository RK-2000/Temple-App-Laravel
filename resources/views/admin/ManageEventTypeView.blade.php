@extends('admin/layout')
@section('content')
    

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-border-color"></i>
        </span> Manage Events Types
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page">
            <span>Master</span>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <span>Manage Event Types</span>
          </li>
        </ol>
      </nav>
    </div>
    <div class="row">
      {{-- add event --}}

        {{-- Modal For Add Event --}}
        <div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Event Type</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Event Name</label>
                    <input type="text" class="form-control" name="event-name" placeholder="Event Type Name" required> 
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Event Type Status</label>
                    <select class="form-control" id="event-type" name="event-status" required>
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
        {{-- Button for add event --}}
        <div class="col-12">
          <span class="d-flex align-items-left purchase-popup">
            <button data-toggle="modal" data-target="#event-modal" class="btn download-button purchase-button">Add Event Type</button>
          </span>
        </div>  
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
    
      </div>      
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>

@endsection
