@extends('admin/layout') @section('custom_scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> @endsection @section('content')
<script type="text/javascript">
    function selectAll() {
        var parent = document.getElementById('parent');
        var items = document.getElementsByName('priest_id[]');
        if (parent.checked == true) {
            var items = document.getElementsByName('priest_id[]');
            for (var i = 0; i < items.length; i++) {
                if (items[i].type == 'checkbox') {
                    items[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < items.length; i++) {
                if (items[i].type == 'checkbox')
                    items[i].checked = false;
            }
        }
    }
</script>

<div class="main-panel">

    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <span class="d-flex align-items-left purchase-popup">
          <a href="{{ route('add_user') }}" class="btn download-button purchase-button">Add Priest</a>
        </span>
            </div>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('send_email') }}" method="post">
                            @csrf


                            <table id="table_id" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th id="id">ID</th>
                                        <th id="name">Name</th>
                                        <th id="email">Email</th>
                                        <th id='check'> <label>Select All</label>
                                            <input type="checkbox" class="mx-2" id="parent" onclick="selectAll()"></th>
                                    </tr>
                                </thead>
                            </table>
                            <button type="button" class="btn btn-dark m-3" data-toggle="modal" data-target="#exampleModal">
                                Send E-mail
                              </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Enter Message</label>
                                <textarea name="message" class="form-control" id="exampleInputEmail1" cols="50" rows="10"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        @if($errors->any())
        <script type="text/javascript">
            var error = "{{$errors->first()}}";
            toastr.error(error);
        </script>
        @endif @if(session()->has('message'))
        <script type="text/javascript">
            var message = "{{session()->get('message')}}";
            toastr.success(message);
        </script>
        @endif @if (session()->has('error'))
        <script type="text/javascript">
            var error = "{{session()->get('error')}}";
            toastr.error(error);
        </script>
        @endif
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable({
                    "serverSide": true,
                    "processing": true,
                    "ajax": {
                        url: "{{route('message');}}",
                        type: "GET",
                        data: "{{route('message');}}"
                    },
                    "columnDefs": [{
                        orderable: false,
                        targets: -1
                    }]
                });
            });

            document.getElementById('select-all').onclick = function() {
                var checkboxes = document.getElementsByName('priest_id[]');
                for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                }
            }
        </script>
        @endsection