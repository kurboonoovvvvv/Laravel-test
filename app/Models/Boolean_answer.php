<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boolean_answer extends Model
{
    protected $fillable = [
        'question_id',
        'correct'
    ];

    protected $casts = [
        'correct' => 'boolean'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
