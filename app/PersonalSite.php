<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalSite extends Model
{
    use SoftDeletes;
    protected $table = 'personalSites';
    protected $fillable = ['site'];
}
