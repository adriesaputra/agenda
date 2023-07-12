<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'deskripsi_acara',
        'lokasi_acara',
        'waktu_acara'
    ];

    public function pejabats()
    {
        return $this->belongsToMany(Pejabat::class)->as('pejabats');
    }

    public function liputans()
    {
        return $this->belongsToMany(Liputan::class)->as('liputans');
    }

    public function protokols()
    {
        return $this->belongsToMany(Protokol::class)->as('protokols');
    }
}
