@extends('admin/layout')
@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-border-color"></i>
        </span> Manage Event
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page">
            <span>Master</span>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <span>Manage Event</span>
          </li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <!-- -- add event  -->

        <!-- Modal For Add event -->
        <div class="modal fade bd-example-modal-lg " id="event-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post">
                {{-- 		place		 description --}}
                <div class="modal-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="formGroupExampleInput">Event Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                  </div>
                  
                  <div class="form-group col-md-2">
                    <label for="start">Event date:</label>
                    <input class="form-control" type="date" id="start" name="trip-start"
                          value="2018-07-22"
                          min="2021-01-01" max="2040-12-31">
                  </div>
                  <div class="form-group col-md-2 col-6">
                    <label for="exampleFormControlSelect1">Event Type</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      @foreach ($eventTypes as $eventName )
                      <option value="<?php echo $eventName['event_types_id'] ?>">{{$eventName['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-2 col-6">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option value="0">Active</option>
                      <option value="1">In Active</option>
                    </select>
                  </div>
                </div>
                  

                  <div class="form-group col-6">
                    <label for="Address" class="col-form-label">Address:</label>
                    <textarea class="form-control" id="address"></textarea>
                  </div>
                  <div class="form-group col-6">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control" id=desc"></textarea>
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
        
        <div class="col-12">
          <span class="d-flex align-items-left purchase-popup">
            <button data-toggle="modal" data-target="#event-modal" class="btn download-button purchase-button">Add Event</button>
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