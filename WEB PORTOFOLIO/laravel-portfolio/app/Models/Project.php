<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'year',
    ];

    // Nonaktifkan timestamps jika tabel lama tidak punya kolom created_at/updated_at
    public $timestamps = false;
}
