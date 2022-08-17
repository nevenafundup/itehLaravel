<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv',
        'opis',
        'cena',
        'kategorija'
    ];

    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class);
    }


}
