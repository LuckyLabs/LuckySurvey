<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Nayjest\Grids\Grids;

class GroupsController extends Controller
{
    public function getIndex()
    {

        $grid = Grids::make([
            'src' => Group::class
        ])->render();
        return view('admin.default.grid-page', compact('grid'));
    }
}