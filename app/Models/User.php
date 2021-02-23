<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'surname', 'name', 'email', 'password', 'profile_photo_path',
    ];

    protected $hidden = [
        'password', 'remember_token', 'role_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function hasRole(array $roles)
    {
        return collect($roles)->intersect($this->role->name)->count();
    }

    public function getProfilePhotoPathAttribute($profilePhotoPath)
    {
        return Storage::url($profilePhotoPath);
    }

    /*public function getCreatedAtAttribute($createdAt)
    {
        return Carbon::parse($createdAt)->translatedFormat('d M Y');
    }*/

    /*public function getUpdatedAtAttribute($updatedAt)
    {
        return Carbon::parse($updatedAt)->translatedFormat('d M Y');
    }*/

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function adminlte_image()
    {
        return $this->profile_photo_path;
    }

    public function adminlte_desc()
    {
        return $this->email;
    }

}
