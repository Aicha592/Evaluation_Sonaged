<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class Evaluation extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'evaluateur_id',
        'type_evaluation',
        'score',
        'date_evaluation',
    ];

    public function collaborateur(){
        return $this->belongsTo(User::class, 'collaborateur_id');
   }

   public function evaluateur(){
    return $this->belongsTo(User::class, 'evaluateur_id');
   }
}


