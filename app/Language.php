<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'studentLanguages';
    protected $fillable = ['readingComprehension','WrittedExpression','listeningComprehension','oralExpression','language_id','student_id'];
}
