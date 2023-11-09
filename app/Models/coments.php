<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coments extends Model
{
    use HasFactory;

    protected $fillable = [

        'posts_id',
        'users_id',
        'coments',
    ];


    public function posts()
    {
        return $this->belongsTo(posts::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class,'users_id');
    }

}
