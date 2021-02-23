<?php

namespace App\Models;

use App\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'starter_id', 'main_id', 'dessert_id', 'service_at', 'publication_at', 'available_quantity'
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($menu) {
            if (! app()->runningInConsole()) {
                $menu->user_id = auth()->id();
            }
        });

        self::deleting(function ($menu) {
            if (! app()->runningInConsole()) {
                foreach ($menu->images as $image) {
                    $image->delete();

                    Helper::deleteFile($image->url);
                }
            }
        });
    }

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

}
