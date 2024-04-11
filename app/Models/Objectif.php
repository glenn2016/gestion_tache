<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objectif extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_objectifs',
        'description',
        'date_fin',
        'supression',
        'etat',
        'user_id',
    ];

    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
}
