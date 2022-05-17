<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'lesson_id',
        'question',
        'type',
    ];
}
