
<?php
use App\Models\MenuList;
use App\Models\Groups;


function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
   
function getMenuList()
{
    
    $MenuList = MenuList::getList();
    $groups = Groups::getGroups();
    $data = array(
        'MenuList'=>$MenuList,
        'groups'=>$groups
    );
    return $data;

}