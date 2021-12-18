<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

    protected $fillable = [
        'model',
        'brand',
        'year',
        'plate'
    ];

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
}
