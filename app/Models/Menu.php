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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function starter()
    {
        return $this->belongsTo(Starter::class);
    }

    public function main()
    {
        return $this->belongsTo(Main::class);
    }

    public function dessert()
    {
        return $this->belongsTo(Dessert::class);
    }

}
