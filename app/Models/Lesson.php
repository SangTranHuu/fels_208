<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'course_id',
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }
    
    public function grammars()
    {
        return $this->hasMany(Grammar::class);
    }
}
