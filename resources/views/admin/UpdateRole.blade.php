@extends('admin/layout')
@section('content')



<div class="main-panel">
    <form method="post" action="{{ route('admin.UpdateRole.post') }}">
    @csrf
    <input type="hidden" value="{{ $id }}" name="role_id">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Role Name</label>
                <input type="text" class="form-control" name="role-name" placeholder="Role Name" value="{{$name}}" required> 
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Role Type Status</label>
                <select class="form-control" id="role-type" name="role-status" required>
                  <option value="1" 
                    <?php if($status == 1){
                    echo "selected";
                    }
                    ?>
                >Active</option>
                  <option value="0" <?php if($status == 0){
                    echo "selected";
                }
                ?>>Inactive</option>
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
                            <input id="<?php echo "group".$group->id; ?>" name = "groups[]" value="{{ $group->id}}" class="mr-1" type="checkbox" 
                            <?php 
                                if( in_array($group->id,$group_ids) ){
                                    echo "checked";
                                }
                            ?> >
                            {{ $group->page_label }}
                        </td>
                        
                        
                    </tr>
                        @foreach($MenuList as $list)
                            @if($group->page_name == $list->main_group_name)
                            <tr>
                                <td style="padding-left:50px;">
                                    <input value="{{$list->id}}" name="pages[]" id="<?php echo "list".$list->id; ?>" class="mr-1" onclick="checkGroup('{{$list->id}}','{{$list->menu_group_id}}')" type="checkbox" 
                                    <?php 
                                        if( in_array($list->id,$page_ids) ){
                                            echo "checked";
                                        }
                                    ?> >
                            {{$list->page_label}}
                                </td>
                            </tr>    
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-around">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </form>
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
    function checkGroup(listId,groupId){
        
        var checkBox = document.getElementById("list"+listId);
        
        if (checkBox.checked == true){
            var groupBox = document.getElementById("group"+groupId);
            groupBox.checked = true;
        } 
    }

</script>
@endsection
