<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewUserRegisterRequest extends Request
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
          'first_name' => 'required|string|max:255',
          'last_name' => 'required|string|max:255',
          'DOB' => 'required',
          'user_type' => 'required',
          'institution' => 'required|string',
          'mobile_number' => 'required|max:10',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6',
        ];
    }

    public function response(array $errors)
    {
      return response()->json($errors);
    }

    public function messages()
    {
      return [
        'DOB.required' => 'The date of birth field is required',
      ];
    }

}
