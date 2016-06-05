<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OtherGradesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'grade' 		  	  => 'required|between:2,200',
         'duration'		  	  => 'between:1,10',
         'studyCenter'	  	  => 'between:2,200',
         'descriptionGrade'	  => 'between:5,250',

         ];
    }
}
