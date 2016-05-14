<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherGrade extends Model
{
    use SoftDeletes;
    protected $table = 'otherGrades';
    protected $fillable = ['grade', 'description', 'duration', 'institution', 'student_id'];
}
