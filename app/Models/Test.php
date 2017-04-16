<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'mark',
        'user_id',
        'course_id',
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot('choice_answer_id')->withTimestamps();
    }
}
