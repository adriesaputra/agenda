<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan_id',
        'name',
        'photo'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function agendas()
    {
        return $this->belongsToMany(Agenda::class);
    }
}
