<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function files()
    {
        return $this->hasMany(File::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(File::class, 'parent_id')->where('parent_id', null);
    }
}
