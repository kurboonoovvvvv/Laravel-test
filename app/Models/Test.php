<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Test extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'description', 'time_limit', 'user_id', 'category_id', 'is_active'];


    public function questions()
    {
        return $this->hasMany(Question::class);
    }


    public function results()
    {
        return $this->hasMany(Test_Result::class);
    }
}
