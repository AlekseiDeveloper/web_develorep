<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Model\Tag;

class Article extends Model
{
    protected $fillable = [
        'title', 'text'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
