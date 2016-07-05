<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OpenInviteRequest extends Request
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
            'from' => 'required|email',
            'to' => 'required|email|max:255',
            'message' =>'required|string',
        ];
    }

    public function messages()
    {
      return [
        'to.required' => 'Looks like you\'re inviting an existing user',
      ];
    }
}
