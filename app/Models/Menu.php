<?php

namespace App\Models;

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
                $menu->images->each->delete();
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

    public function setPublicationAtAttribute($publication_at)
    {
        $this->attributes['publication_at'] = $publication_at ? Carbon::parse($publication_at) : null;
    }

    public function setStarterIdAttribute($starter)
    {
        $this->attributes['starter_id'] = Starter::find($starter) ? $starter : Starter::create(['name' => $starter])->id;
    }

    public function setMainIdAttribute($main)
    {
        $this->attributes['main_id'] = Main::find($main) ? $main : Main::create(['name' => $main])->id;
    }

    public function setDessertIdAttribute($dessert)
    {
        $this->attributes['dessert_id'] = Dessert::find($dessert) ? $dessert : Dessert::create(['name' => $dessert])->id;
    }

}
