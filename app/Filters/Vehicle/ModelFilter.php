<?php

namespace App\Filters\Vehicle;

class ModelFilter {

    public function filter($builder, $search)
    {
        if(isset($search['model'])) {
            return $builder->where('model', $search['model']);
        }

        return $builder;
    }
}