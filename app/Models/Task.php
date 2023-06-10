<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'id_user_create',
        'id_user_response',
    ];

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'id_user_create');
    }

    public function userResponse()
    {
        return $this->belongsTo(User::class, 'id_user_response');
    }
}
