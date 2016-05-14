<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
	use SoftDeletes;
    protected $table = 'certifications';
    protected $fillable = ['certification','description','institution','student_id'];
}
