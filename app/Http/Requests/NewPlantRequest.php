<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewPlantRequest extends Request
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
        'plant_name' => 'required',
        'planted_date' => 'required|date',
        'height' => 'required',
        'update_frequency' => 'required',
        'long' => 'required',
        'lat' => 'required',
        'description' => 'required',
        //'image' => 'required',
      ];
    }

    public function response(array $errors)
    {
      return response()->json($errors);
    }
}
