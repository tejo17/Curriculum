<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	use SoftDeletes;
    protected $table = 'studentLanguages';
    protected $fillable = ['readingComprehension','WrittedExpression','listeningComprehension','oralExpression','language_id','student_id'];
}
