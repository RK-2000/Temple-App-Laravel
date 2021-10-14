@extends('admin/layout') @section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<style>
    .container{
        margin-top: 10px;
        background-color: white;
        border-radius: 15px;
    }
    </style>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-border-color"></i>
              </span> Image Gallery
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                  <span>Gallery</span>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <span>Image Gallery</span>
                </li>
              </ol>
            </nav>
          </div>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('add.images')}}" class='dropzone  dz-clickable' enctype="multipart/form-data" >
                    <div class="dz-message">Drop files here or click to upload.
                    </div>
                </form> 
            </div>
        </div>
        <div class="container">
            <div class="card-columns mt-2" id="image-container">
                
                
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    
    $(document).ready(function(){
    $.ajax({ url: '{{ route('images_gallery') }}',
        context: document.body,
        success: function(text) {
            let container = document.getElementById('image-container');
            text.forEach(element => {
                container.innerHTML+=element;    
            });
        }
        });
    });
    
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone",{ 
        maxFilesize: 5,  
        acceptedFiles: ".jpeg,.jpg,.png,.pdf",
        maxFileWidth:300,
        maxFileHeight:300,
    });

    myDropzone.on("sending", function(file, xhr, formData) {
       formData.append("_token", '{{  @csrf_token()  }}');
    });

    myDropzone.on("errormultiple", function(file, response) {
        alert("wrong");
    });
    myDropzone.on("success", function(file, response) {
        location.reload();
    }); 
    </script>
@endsection
