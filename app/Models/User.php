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
    use HasFactory, Notifiable, SoftDeletes;

    const SUSPENDED = 'suspended';
    const PENDING = 'pending';
    const ACTIVE = 'active';

    protected $fillable = [
        'document_number', 'surname', 'name', 'email', 'password', 'profile_photo_path', 'status',
    ];

    protected $hidden = [
        'password', 'remember_token', 'role_id', 'status',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getProfilePhotoPathAttribute($profilePhotoPath)
    {
        return Storage::url($profilePhotoPath);
    }

    public function getCreatedAtAttribute($createdAt)
    {
        return Carbon::parse($createdAt)->translatedFormat('d F Y');
    }

    public function getUpdatedAtAttribute($updatedAt)
    {
        return Carbon::parse($updatedAt)->translatedFormat('d F Y');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function scopeStudents($query)
    {
        return $query->where('role_id', Role::STUDENT_ID);
    }

    public function adminlte_image()
    {
        return $this->profile_photo_path;
    }

    public function adminlte_desc()
    {
        return $this->email;
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

}
