<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Abonnement;

class serviice extends Model
{
    use HasFactory;
    protected $table='serviice';
    protected $primaryKey='id';

    protected $fillable = [
        'name','price','adress','description','typename','id_user','image','image360'
    ];
    public function type(){
        return $this->belongsToMany(TypeService::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }

    public function pack()
    {
        return $this->belongsToMany(Abonnement::class, 'abonnement_serviice');
    }
}
