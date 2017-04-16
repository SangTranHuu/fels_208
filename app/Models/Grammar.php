<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
    protected $fillable = [
        'title',
        'structute',
        'description',
        'example',
        'lesson_id',
    ];
    
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
