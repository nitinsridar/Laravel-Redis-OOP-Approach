<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Articles extends Model  
{
    protected $table = 'articles';
    protected $fillable = [
        'id', 'user_id', 'article_title', 'article_text', 'article_image','created_at', 'updated_at'

    ];

   
}
