<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{

  public function welcome()
  {
     return view('welcome');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
     $found_user = User::find($id);

      if($found_user)
        {
          return Response::json([
            'status' => 'success',
            'response' => $found_user->toArray()
          ],200);
        }
            return Response::json([
              'status' => 'fail',
              'error' => [
                'message' => 'User Not Found'
              ]
            ],200);

   }

   public function edit(Request $user)
   {

     $current_user = Auth::guard('api')->user();

     $current_user->first_name = $user->first_name;
     $current_user->last_name = $user->last_name;
     $current_user->save();

     return Response::json([
       'status' => 'success',
       'response' => $current_user->toArray()
     ],200);
   }

   public function allplants()
   {
     $user = Auth::guard('api')->user();
     return [
       $user->plants()->get(),
     ];
   }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function editProfile($id){

    	return view('user.profile.edit',['user' => User::find($id)]);
    }

    public function login(LoginRequest $request)
    {
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
      {
        return Response::json([
          'response' => Auth::user()->makeVisible('api_token')->toArray(),
          'status' => 'success'
        ],200);
      }
        return Response::json([
          'error' => [
            'message' => 'Authentication Failed',
            'status' => 'fail'
          ]
        ],401);
    }
}
