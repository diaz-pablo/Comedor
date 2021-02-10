<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'starter_id', 'main_id', 'dessert_id', 'service_at', 'publication_at', 'available_quantity'
    ];

}
