@extends('admin/layout')
@section('content')
<div class="main-panel">
    <form method="post" action="{{ route('admin.addRole.post') }}">
    @csrf
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Role Name</label>
                <input type="text" class="form-control" name="role-name" placeholder="Role Name" required> 
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Role Type Status</label>
                <select class="form-control" id="role-type" name="role-status" required>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>GROUP/PAGE NAME</th>
                    </tr>
                </thead>
                <?php
                    $data = array();
                    $data = getMenuList(); 
                    $MenuList = $data["MenuList"];
                    $groups = $data["groups"];
                ?>
                <tbody>
                    @foreach($groups as $group)
                    <tr>    
                        <td class="text-primary">
                            <input value="{{ $group->id}}" class="mr-1" type="checkbox" onclick="selectAll();">
                            {{ $group->page_label }}
                        </td>
                        
                    </tr>
                        @foreach($MenuList as $list)
                            @if($group->page_name == $list->main_group_name)
                            <tr>
                                <td style="padding-left:50px;">
                                    <input value="{{$list->id}}" class="mr-1" type="checkbox">{{$list->page_label}}
                                </td>
                            </tr>    
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </form>
</div>
@endsection