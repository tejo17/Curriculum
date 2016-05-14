<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrivingLicense extends Model
{
	use SoftDeletes;
    protected $table = 'studentDrivingLicenses';
    protected $fillable = ['license_id','student_id'];
}
