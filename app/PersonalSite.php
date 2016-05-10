<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalSite extends Model
{
    protected $table = 'personalsites';
    protected $fillable = ['site'];
}
