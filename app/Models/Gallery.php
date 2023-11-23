<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
      'slug',
        'description',
        'is_visible',
        'category_id',
        'url',
        'primary_hex',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function pictures(){
        return $this->hasMany(Picture::class);
    }
}
