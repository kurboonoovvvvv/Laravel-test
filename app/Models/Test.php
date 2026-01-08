<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'title',
        'description',
        'tags',
        'duration',
        'passing_score',
        'attempts',
        'start_time',
        'end_time',
        'number_questions',
        'mix',
    ];

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
