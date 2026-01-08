<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'test_type_id',
        'title',
        'description',
        'type_id',
        'score',
    ];

    // Single choice ответы
    public function singleAnswers()
    {
        return $this->hasMany(SingleChoiceAnswer::class);
    }

    // Multiple choice ответы
    public function multipleAnswers()
    {
        return $this->hasMany(MultipleChoiceAnswer::class);
    }

    // Boolean ответ
    public function booleanAnswer()
    {
        return $this->hasOne(BooleanAnswer::class);
    }

    // Short ответ
    public function shortAnswer()
    {
        return $this->hasOne(ShortAnswer::class);
    }

    // Связь с тестом
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    // Универсальный метод для всех ответов (можно использовать в Blade и контроллере)
    public function answers()
    {
        switch ($this->type) {
            case 'single':
                return $this->singleAnswers();
            case 'multiple':
                return $this->multipleAnswers();
            case 'boolean':
                return $this->booleanAnswer();
            case 'short':
                return $this->shortAnswer();
            default:
                return null;
        }
    }
}
