<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->morphmany(Comment::class, 'commentable');
    }

    public function categories()
    {
        return $this->morphmany(Category::class, 'categoryable');
    }
    
    public function attachments()
    {
        return $this->hasmany(Attachment::class, 'article_id');
    }

    public function user()
    {
        return $this->belonogsto(User::class, 'is_admin');
    }
}