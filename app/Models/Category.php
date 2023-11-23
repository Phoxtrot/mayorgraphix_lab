<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
      'slug',
        'description',
        'is_visible',
    ];
    public function galleries(){
        return $this->hasMany(Gallery::class);
    }
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function child(){
        return $this->hasMany(Category::class, 'parent_id');
    }
}
