<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liputan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'jenis_liputan'
    ];

    public function agendas()
    {
        return $this->belongsToMany(Agenda::class);
    }
}
