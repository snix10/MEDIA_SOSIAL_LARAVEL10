<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'posts',
    ];

    protected $with = ['user'];
    protected $withCount = ['coments'];
    protected $latest = ['id'];

    public function coments()
    {
        return $this->hasMany(coments::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'users_id');
    }
}
