<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    use HasFactory;
    protected $table='typeservice';
    protected $primaryKey='id';
    protected $fillable = [
        'typename'
    ];
    public function users(){
        return $this->belongsToMany(Service::class);
    }
}
