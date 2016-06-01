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
         'job'           => 'required|between:2,100',
         'enterprise'    => 'required|between:2,200',
         'from'          => 'required|date',
         'to'            => 'date',
         'city'          => 'required',
         'state'         => 'required',
         ];
    }
}
