<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'artist',
        'body',
        'user_id'
        ];
    
    public function getPagenateByLimit(int $limit_count = 5)
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
public function comments()   
{
    return $this->hasMany(Comment::class);  
}

    public function user()
{
    return $this->belongsTo(User::class);
}
}
