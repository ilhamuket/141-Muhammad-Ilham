<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmDataArticle extends Model
{
    use HasFactory;

    protected $table = 'tm_data_articles';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(TmRefCategory::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(CommentArticle::class, 'article_id');
    }
}
