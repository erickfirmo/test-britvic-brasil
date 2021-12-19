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

    protected $dates = ['created_at', 'dob'];

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function getDayOfBirthday()
    {
        return $this->dob->format('d/m/Y');
    }
}
