<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "posts";
    protected $dates = ['created_at'];
    protected $fillable = [
        'title',
        'content',
        'author_id',
        'photo',
    ];

    public function author() 
    {
        return $this->belongsTo(User::class);
    }

    public function scopePorAutor($query, $authorId)
    {
        return $query->where('author_id', $authorId);
    }

    public function scopeOrdenarporFecha($query, $order)
    {
        return $query->orderBy('created_at', $order);
    }

}
