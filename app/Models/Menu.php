<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getServiceAtAttribute($serviceAt)
    {
        return Carbon::parse($serviceAt)->translatedFormat('d M Y');
    }

    public function getPublicationAtAttribute($publicationAt)
    {
        return Carbon::parse($publicationAt)->translatedFormat('d M Y');
    }

}
