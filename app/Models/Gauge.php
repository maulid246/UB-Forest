<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gauge extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'gauges';

    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = ['temperature', 'humidity'];
}
