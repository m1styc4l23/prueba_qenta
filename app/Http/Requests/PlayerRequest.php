<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'id_player'     => ['required', 'numeric'],
            'first_name'    => ['required', 'string:value'],
            'last_name'     => ['required', 'string:value'],
            'position'      => ['between:1,3', 'string:value'],
            'height_feet'   => ['numeric'],
            'height_inches' => ['numeric'],
            'weight_pounds' => ['numeric'],
            'id_team'       => ['required', 'numeric'],
            'full_name'     => ['required', 'string:value'],
            'name'          => ['required', 'string:value'],
            'abbreviation'  => ['required', 'string:value', 'between:2,3'],
            'city'          => ['required', 'string:value'],
            'conference'    => ['required', 'string:value'],
            'division'      => ['required', 'string:value'],
        ];
    }
}
