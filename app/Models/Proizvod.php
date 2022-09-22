<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    use HasFactory;
    protected $fillable = [
        'ime',
        'cena',
        'proizvodjac_id',
        'tip_id'
    ];

    public function proizvodjac(){
        return $this->belongsTo(Proizvodjac::class);
    }

    public function tip(){
        return $this->belongsTo(Tip::class);
    }
}
