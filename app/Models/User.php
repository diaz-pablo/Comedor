<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

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
        return 'https://picsum.photos/300/300';
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
