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

    public function getDocumentNumber()
    {
        $document_number = preg_replace("/\D/", '', $this->document_number);
  
        return strlen($document_number) === 11 ? preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $document_number) : $document_number;
    }
}
