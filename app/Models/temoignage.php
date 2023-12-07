<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temoignage extends Model
{
    use HasFactory;
    protected $table='temoignage';
    protected $primaryKey='id';
    protected $fillable = [
        'userName','userEmail','contenu','serviceID','rating','status',
    ];
    
    public function service()
    {
        return $this->belongsTo('App\Models\serviice','serviceID');
    }
}
