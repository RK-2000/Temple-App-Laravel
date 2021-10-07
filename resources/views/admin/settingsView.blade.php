@extends('admin.layout')

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
                    
                    
                    {{-- FORM START --}}
                    
                    <form class="row  needs-validation" method="POST" action="{{route('settingsUpdate')}}" >
                      @csrf
                      <div class="col-md-6">
                        <label for="name" class="form-label">Temple Name</label>
                        <input type="text" class="form-control" id="name" name="temple_name" required>
                        <div class="valid-feedback">
                                    </div>
                                  </div>
                      <div class="col-md-6">
                        <label for="adress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                        <div class="valid-feedback">
                                    </div>
                                  </div>
                                  <div class="col-md-6 my-4">
                                <label for="facebook_link" class="form-label">Facebook Link</label>
                                <div class="input-group has-validation">
                                 <input type="text" class="form-control" id="facebook_link" name="facebook_link" aria-describedby="inputGroupPrepend" required>
                                   </div>
                                </div>
                                 <div class="col-md-6 my-4">
                                   <label for="youtube_link" class="form-label">Youtube Link</label>
                                  <div class="input-group has-validation">
                                 <input type="text" class="form-control" id="youtube_link" name="youtube_link" aria-describedby="inputGroupPrepend" required>
                                </div>
                                  </div>
                                 <div class="col-md-6 my-4">
                                <label for="twitter_link" class="form-label">Twitter Link</label>
                                  <div class="input-group has-validation">
                               <input type="text" class="form-control" id="twitter_link" name="twitter_link" aria-describedby="inputGroupPrepend" required>
                              </div>
                               </div>
                              <div class="col-md-6 my-4">
                              <label for="instagram_link" class="form-label">Instagram Link</label>
                                 <div class="input-group has-validation">
                                  <input type="text" class="form-control" id="instagram_link" name="instagram_link" aria-describedby="inputGroupPrepend" required>
                                 </div>
                                  </div>
                                  
                                  <div class="col-md-12 my-4">
                                    <label for="about_us" class="form-label">About us </label>
                                    <textarea name="about_us" id="about_us" cols="30" rows="10"></textarea>
                                  </div>
                                  <div class="col-md-6 my-1">
                                   <label class="file">Temple Logo</label><br>
                                    <input type="file" id="file" aria-label="File browser example" name="temple_logo">
                                    <span class="file-custom"></span>
                                    </label>
                                    </div>
                                  <div class="col-12 my-4">
                                    <button class="btn btn-primary" type="submit">Add Details</button>
                                  </div>
                                </form>


                                <script>
                                     CKEDITOR.replace('about_us');
                                 </script>
                                            {{-- <script>
                                            CKEDITOR.replace('address');
                                            </script> --}}


@endsection