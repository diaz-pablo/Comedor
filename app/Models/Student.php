<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    const SUSPENDED = 'suspended';
    const PENDING = 'pending';
    const ACTIVE = 'active';

    protected $fillable = [
        'user_id', 'document_number', 'status',
    ];

    protected static function boot()
    {
        parent::boot();

        self::deleted(function ($student) {
            if (! app()->runningInConsole()) {
                $student->user->delete();
                // TODO: Eliminar si tiene una imágen diferente a la default,
                // TODO: ojo con el polimorfismo en la tabla de Image, ya que el scope global
                // TODO: elimina la imagen (el archivo) cuando se llama a eliminar una imágen de la bd.
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*public function getCreatedAtAttribute($createdAt)
    {
        return Carbon::parse($createdAt)->translatedFormat('d M Y');
    }*/

    /*public function getUpdatedAtAttribute($updatedAt)
    {
        return Carbon::parse($updatedAt)->translatedFormat('d M Y');
    }*/

}
