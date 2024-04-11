<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'date_fin',
        'objectif_id',
        'user_id',
        'etat',
        'user_responsable',
    ];
}
