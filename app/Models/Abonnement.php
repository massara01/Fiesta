<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\serviice;

class Abonnement extends Model
{
    use HasFactory;
    protected $table = 'Abonnement';
    protected $primaryKey = 'idAb';
    public $timestamps = false;
   
    protected $fillable = [
        'name',
        'remise', 
        'description',
        
    ];

    public function services()
    {
        return $this->belongsToMany(serviice::class, 'abonnement_serviice');
    }
}
