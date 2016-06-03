<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCycle extends Model
{
	use SoftDeletes;
    protected $table = 'studentcycles';
    protected $fillable = ['center','dateTo','dateFrom','student_id','cycle_id','city_id'];
}
