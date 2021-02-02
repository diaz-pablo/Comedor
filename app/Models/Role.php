<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN_NAME = 'Admin';
    const ADMIN_ID = 1;
    const STUDENT_NAME = 'Student';
    const STUDENT_ID = 2;

    protected $fillable = [
        'name',
        'display_name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
