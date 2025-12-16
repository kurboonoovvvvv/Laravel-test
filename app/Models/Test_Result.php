<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Test_Result extends Model
{
    use HasFactory;


    protected $fillable = ['test_id', 'user_id', 'score', 'correct_answers_count', 'total_questions', 'finished_at'];


    protected $casts = ['finished_at' => 'datetime'];


    public function test()
    {
        return $this->belongsTo(Test::class);
    }


    public function userAnswers()
    {
        return $this->hasMany(User_Answer::class, 'result_id');
    }
}
