<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_id',
        'name',
        'category',
        'price',
        'description',
        'image',
        'qty',
    ];
}
