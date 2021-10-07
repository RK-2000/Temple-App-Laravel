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
                        <h3 class="page-title">
                          <span class="page-title-icon bg-gradient-primary text-white mr-2">
                            <i class="mdi mdi-account-settings"></i>
                          </span> Manage Event
                        </h3>
                      
                      </div>

                                {{-- Form Template Start--}}

                                  <div class="row">

                                    <div class="col-md-12 grid-margin stretch-card">
                                      <div class="card">
                                        <div class="card-body">

                                          <form class="row needs-validation" method="POST" action="{{route('edit_event.post')}}" >
                                            @csrf
                                            <div class="form-group col-md-6">
                                              <label for="name">Event Name</label>
                                              <input type="text" class="form-control" name="name" value="<?php echo $data->name ?>" id="name" placeholder="Event Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="start">Event date:</label>
                                              <input class="form-control" type="date" value="<?php echo $data->event_date_time ?>" name="event_date_time" id="start" name="trip-start"
                                                    value="2018-07-22"
                                                    min="2021-01-01" max="2040-12-31">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="exampleFormControlSelect1">Event Type</label>
                                              <select class="form-control" id="exampleFormControlSelect1" name="event_types_id">
                                                @foreach ($eventTypes as $eventName )
                                                <option value="<?php echo $eventName['event_types_id'] ?>">{{$eventName['name']}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="status">Status</label>
                                              <select class="form-control" name="status"  id="exampleFormControlSelect1">
                                                <option value="0">Active</option>
                                                <option value="1">In Active</option>
                                              </div></select>
                                            </div>
                                            <div class="form-group col-md-12">
                                              <label for="Address" class="col-form-label">Address:</label>
                                              <textarea class="form-control" id="address" name="place" rows="5" cols="30"><?php echo $data->place ?></textarea>
                                            </div>
                                            <div class="form-group col-12">
                                              <label for="message-text" class="col-form-label">Description:</label>
                                              <textarea class="form-control" id=description" rows="10" cols="30"  name="description"><?php echo $data->description ?></textarea>
                                            </div>
                                            
                                            <input type="hidden" value="<?php echo $id ?>" name="id">
                                            <button type="submit" class="btn btn-gradient-primary mx-3">Save</button>
                                            
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    
                                  </div>
                                </div>
                                {{-- Form Template  --}}



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
                                     CKEDITOR.replace('description');
                                 </script>
                                            {{-- <script>
                                            CKEDITOR.replace('address');
                                            </script> --}}


@endsection