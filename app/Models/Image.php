<?php

namespace App\Models;

use App\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url'
    ];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function ($image) {
            if (! app()->runningInConsole()) {
                Helper::deleteFile($image->url);
            }
        });
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
