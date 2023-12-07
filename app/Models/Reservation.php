<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    protected $primaryKey = 'idR';
    public $timestamps = false;

    protected $fillable = [
        'date',
        'prix',
        'email',
        'services',
        'packs',
    ];
   
    
}
