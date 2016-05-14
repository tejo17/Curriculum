<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aptitude extends Model
{
	use SoftDeletes;
    protected $table = 'aptitudes';
    protected $fillable = ['aptitude','student_id'];
}
