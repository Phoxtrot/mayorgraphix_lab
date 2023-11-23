<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function section() {
        return $this->belongsTo(Section::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function save(array $options = [])
    {
        if (!$this->user_id) {
            $this->user_id = Auth::id();
        }

        parent::save($options);
    }
}
