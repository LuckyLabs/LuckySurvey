<?php
namespace App\Grids;

use Nayjest\Builder\Scaffold;
use Nayjest\Grids\Grids;

class GridsHelper
{
    public static function prettyGrids()
    {
        # set default grids building options:
        Grids
            ::blueprints()
            ->getFor('Nayjest\Grids\FieldConfig')
            # make all columns sortable by default
            ->add(function(Scaffold $s) {
                if (!isset($s->input['sortable']))
                    $s->input['sortable'] = true;
            });
    }
}
