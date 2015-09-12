<?php

namespace App\Http\Controllers\Admin;

use App\Grids\GridsHelper;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Nayjest\Builder\Instructions\SetValue;
use Nayjest\Grids\DataRow;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\Grids;

class UsersController extends Controller
{
    public function getIndex()
    {
        //(new FieldConfig)->setSortable()

        GridsHelper::prettyGrids();

        $grid = Grids::make([
                'src' => (new User())->newQuery()->with('groupRelations'),
                'columns' => [
                    [
                        'id'
                    ]
                    ,
                    [
                        'email'
                    ],
                    [
                        'first_name'
                    ],
                    [
                        'last_name'
                    ],
                    [
                        'department'
                    ],
                    [
                        'position',
                    ],
                    [
                        'name' => 'group_names',
                        'label' => 'Groups',
                        'sortable' => false,
                        'callback' => function ($value, DataRow $row) {
                            /** @var User $user */
                            $user = $row->getSrc();
                            $groupRels = $user->groupRelations;
                            $res = [];
                            foreach ($groupRels as $groupRel) {
                                $res[] = $groupRel->group->name;
                            }
                            return implode(', ', $res);
                        }
                    ],
                    [
                        'name' => 'actions',
                        'label' => 'Actions',
                        'sortable' => false,
                        'callback' => function ($value, DataRow $row) {
//                        $manageMembersUrl = '/admin/groups/members/' . $row->getCellValue('id');
//                        $manageMembersLink = "<a class='btn btn-info' href='$manageMembersUrl'><i class='glyphicon glyphicon-user'></i>&nbsp;Manage Members</a>";
//
                        $deleteUrl = '/admin/users/delete/' . $row->getCellValue('id');
                        $deleteLink = "<a class='btn btn-danger' href='$deleteUrl'><i class='glyphicon glyphicon-trash'></i>&nbsp;Delete</a>";

                            return "<div class='btn-group'>$deleteLink</div>";
                        }
                    ]
                ]
            ])->render() . '';
        //var_dump(\DB::getQueryLog());die();
        $title = 'User Management';
        $links = [
            '/admin/users/create' => "<i class='glyphicon glyphicon-plus'></i>&nbsp;New User",
        ];
        return view('admin.default.grid-page', compact('grid', 'title', 'links'));
    }
}