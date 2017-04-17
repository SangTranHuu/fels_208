<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'coures_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }
}
