<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protokol extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo'
    ];

    public function agendas()
    {
        return $this->belongsToMany(Agenda::class);
    }
}
