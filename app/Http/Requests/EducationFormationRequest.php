<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfessionalExperienceRequest extends Request
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
         'center'          => 'required|between:2,200',
         'dateFrom'        => 'required|date',
         'dateTo'          => 'date',
         'family'          => '',
         'cycle'           => '',
         'city'            => 'required',
         'state'           => 'required',
         'otherFormations' => 'between:2,255',
         ];
    }
}
