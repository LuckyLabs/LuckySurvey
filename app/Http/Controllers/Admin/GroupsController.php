<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Nayjest\Grids\DataRow;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\Grids;

class GroupsController extends Controller
{
    public function getIndex()
    {

        $grid = Grids::make([
            'src' => Group::class,
            'columns' => [
                'id',
                'name',
                [
                    'name' => 'actions',
                    'label' => 'Actions',
                    'callback' => function($value, DataRow $row){
                        $manageMembersUrl = '/admin/groups/members/' . $row->getCellValue('id');
                        $manageMembersLink = "<a class='btn btn-info' href='$manageMembersUrl'><i class='glyphicon glyphicon-user'></i>&nbsp;Manage Members</a>";

                        $manageMembersUrl = '/admin/groups/delete/' . $row->getCellValue('id');
                        $deleteGroupLink = "<a class='btn btn-danger' href='$manageMembersUrl'><i class='glyphicon glyphicon-trash'></i>&nbsp;Delete</a>";

                        return "<div class='btn-group'>$manageMembersLink $deleteGroupLink</div>";
                    }
                ]
            ]
        ])->render();
        $title = 'User Groups Management';
        $links = [
            '/admin/groups/create' => "<i class='glyphicon glyphicon-plus'></i>&nbsp;New Group",
        ];
        return view('admin.default.grid-page', compact('grid', 'title', 'links'));
    }

    public function getMembers($groupId)
    {
        $group = Group::findOrFail($groupId);
        $users = (new User)->newQuery()
            ->leftJoin('user_groups', 'users.id','=','user_groups.user_id')
            ->where('user_groups.group_id', '=', $groupId);

        $grid = Grids::make([
            'src' => $users,
            'columns' => [
                'id',
                'email',
                'first_name',
                'last_name',
                'department',
                'position',
                [
                    'name' => 'actions',
                    'label' => 'Actions',
                    'callback' => function(){
                        return "<a class='btn btn-info'><i class='glyphicon glyphicon-trash'></i>&nbsp;Remove</a>";
                    }
                ]
            ]
        ])->render();
        $links = [
            '/admin/groups/create' => "<i class='glyphicon glyphicon-plus'></i>&nbsp;New Group",
            '/admin/groups' => 'Manage Groups'
        ];
        $title = "[$group->name] User Group Management";
        return view('admin.default.grid-page', compact('grid', 'title', 'links'));
    }
}