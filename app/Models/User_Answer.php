<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User_Answer extends Model
{
    use HasFactory;


    protected $fillable = ['result_id', 'question_id', 'answer_id', 'text_answer', 'is_correct'];


    public function result()
    {
        return $this->belongsTo(Test_Result::class, 'result_id');
    }


    public function question()
    {
        return $this->belongsTo(Question::class);
    }


    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
