<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Posts extends Model  
{
    protected $table = 'posts';
    protected $fillable = [
        'id', 'user_id', 'text', 'image', 'created_at', 'updated_at'

    ];

   
}
