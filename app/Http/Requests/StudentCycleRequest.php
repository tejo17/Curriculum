<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentCycleRequest extends Request
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
         'carreer'         => 'required|between:2,200',
         'center'          => 'required|between:2,200',
         'dateFrom'        => 'required|digits:4',
         'dateTo'          => 'digits:4',
         'family'          => 'required|exists:profFamilies,name',
         /*'cycle'           => 'required|exists:cycles,name',*/
         'cityCycle'       => 'required',
         'stateCycle'      => 'required',
         'otherFormations' => 'between:2,255',
         ];
    }
}
