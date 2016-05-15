<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $student_id;

	public function __construct()
	{
    if (\Auth::user() !== null) {
	  $this->student_id = self::getId();
    }
	}
   	public function getId(){

   		$user_id = \Auth::user()->id;
        $student_id = \DB::table('students')->where('user_id' , $user_id)->value('id');
        return $student_id;
   	}
}
