<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel will assume it is plural form of the model name)
    protected $table = 'data';

    // Define the fillable fields (columns that can be mass assigned)
    protected $fillable = [
        'resident_count',
        'tree_count',
        'admin_count',
    ];

    // Optionally, you can define the timestamp format or disable it if needed
    // public $timestamps = false; // If you don't want the created_at and updated_at columns
}
