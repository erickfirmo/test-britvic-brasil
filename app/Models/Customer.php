<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'document_number',
        'dob'
    ];

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
}
