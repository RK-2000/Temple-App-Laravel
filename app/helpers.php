
<?php

use App\Models\MenuList;
use App\Models\Groups;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;
use PHPUnit\TextUI\XmlConfiguration\Group;

function changeDateFormate($date, $date_format)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function getMenuList()
{
    $user = Auth::guard('admin')->user();
    $role_id = $user->role_id;

    $role = Roles::where('id', $role_id)->first();
    // Admin Condition
    if ($role->id == 1) {
        $MenuList = MenuList::all();
        $groups = Groups::all();
        $data = array(
            'MenuList' => $MenuList,
            'groups' => $groups
        );

        return $data;
    }
    // Other Than Admin
    else {
        $group_ids = explode(',', $role->group_id);
        $page_ids = explode(',', $role->page_id);
        $MenuList = MenuList::whereIn('id', $page_ids)->get();
        $groups = Groups::whereIn('id', $group_ids)->get();
        $data = array(
            'MenuList' => $MenuList,
            'groups' => $groups
        );
        return $data;
    }
}
