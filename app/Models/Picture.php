<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
      'slug',
        'description',
        'is_visible',
        'gallery_id',
        'photo_id',
        'published_at',
    ];
    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }
}
