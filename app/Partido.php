<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    public function equipos() {
        return $this->belongsToMany('App\Equipo')->withTimestamps();
    }

    public function scopeFase($query, $fase)
    {
        return $query->where('fase', '=', $fase);
    }
}
