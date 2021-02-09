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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($createdAt)
    {
        return Carbon::parse($createdAt)->translatedFormat('d M Y');
    }

    public function getUpdatedAtAttribute($updatedAt)
    {
        return Carbon::parse($updatedAt)->translatedFormat('d M Y');
    }

}
