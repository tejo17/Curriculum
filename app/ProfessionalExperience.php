<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalExperience extends Model
{
	use SoftDeletes;
    protected $table = 'professionalExperiences';
    protected $fillable = ['enterprise','description','job','from','to','city_id','student_id'];
}
