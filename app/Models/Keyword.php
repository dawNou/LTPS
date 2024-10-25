<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Keyword extends Model
{
    use HasFactory;

    protected $primaryKey = 'keyword_id';
    protected $table = 'keywords';

    protected $fillable = ['keyword', 'frequency'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_keyword', 'keyword_id', 'category_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_keyword', 'keyword_id', 'post_id');
    }
    
}
