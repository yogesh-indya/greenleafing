<?php

namespace App\Http\Controllers;

Use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\NewUserRegisterRequest;

class RegistrationController extends Controller
{
    public function register(NewUserRegisterRequest $request)
    {
      $data = $request->all();

      $registeredUser = User::create([
              'first_name' => $data['first_name'],
              'last_name' => $data['last_name'],
              'DOB' => $data['DOB'],
              'user_type' => $data['user_type'],
              'institution' => $data['institution'],
              'mobile_number' => $data['mobile_number'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'api_token' => str_random(40),
              'gl_code' => str_random(5),
          ]);

          return Response::json([
            'status' => 'success',
            'response' => $registeredUser->toArray()
          ],200);
    }
}
