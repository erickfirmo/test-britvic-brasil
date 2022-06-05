<?php

namespace App\Filters\Vehicle;

class BrandFilter {

    public function filter($builder, $search)
    {
        if(isset($search['brand'])) {
            return $builder->where('brand', $search['brand']);
        }

        return $builder;
    }
}