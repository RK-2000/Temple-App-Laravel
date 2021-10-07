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
                          </span> Settings
                        </h3>
                      
                      </div>
                    
                    
                    

                                {{-- Form Template Start--}}

                                  <div class="row">

                                    <div class="col-md-12 grid-margin stretch-card">
                                      <div class="card">
                                        <div class="card-body">

                                          <form class="row needs-validation" method="POST" action="{{route('settingsUpdate')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group col-md-6">
                                              <label for="temple_name">Temple Name</label>
                                              <input type="text" class="form-control" name="temple_name" value="<?php echo $data['temple_name'] ?>" id="temple_name" placeholder="Temple Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="address ">Address</label>
                                              <input type="text" class="form-control" id="address" name="address" value="<?php echo $data['address'] ?>" placeholder="Address">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="facebook_link">Facebook link</label>
                                              <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="<?php echo $data['facebook_link'] ?>"placeholder="Facebook link">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="youtube_link">Youtube link</label>
                                              <input type="text" class="form-control" id="youtube_link" name="youtube_link" value="<?php echo $data['youtube_link'] ?>"placeholder="Youtube link">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="twitter_link ">Twitter link</label>
                                              <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="<?php echo $data['twitter_link'] ?>"placeholder="Twitter link">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="instagram_link ">Instagram link</label>
                                              <input type="text" class="form-control" id="instagram_link" name="instagram_link" value="<?php echo $data['instagram_link'] ?>"placeholder="Instagram link">
                                            </div>
                                            
                                            <input type="hidden" value="<?php echo $data['id'] ?>" name="id">
                                            
                                            <div class="form-group col-md-12">
                                              <label for="about_us">About Us</label>
                                              <textarea class="form-control" id="about_us" name="about_us" rows="10" cols="30" ><?php echo $data['about_us'] ?></textarea>
                                            </div>
                                            <div class="form-group ">
                                              <label>File upload</label>
                                              <input type="file" name="temple_logo" class="file-upload-default">
                                              <div class="input-group col-xs-12">
                                                <input type="file" name="temple_logo" class="form-control file-upload-info"  placeholder="Upload Image">
                                            </div>
                                            <button type="submit" class="btn btn-gradient-primary mr-2 col-md-6">Submit</button>
                                            
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
                                     CKEDITOR.replace('about_us');
                                 </script>
                                            {{-- <script>
                                            CKEDITOR.replace('address');
                                            </script> --}}


@endsection