<?php

namespace App\Filters\Vehicle;

class PlateFilter {

    public function filter($builder, $search)
    {
        if(isset($search['plate'])) {
            return $builder->where('plate', $search['plate']);
        }

        return $builder;
    }
}