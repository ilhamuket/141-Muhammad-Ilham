<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentArticle extends Model
{
    use HasFactory;

    protected $table = 'comments_article';

    protected $fillable = [
        'article_id',
        'user_id',
        'content',
    ];
}
