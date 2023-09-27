<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        $response = [];

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);

            if($validator->fails()){
                return $this->throwValidation($validator->errors());
            }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;

            $response['message'] = 'User Register Successfully.!';
            $this->setStatusCode(200);
        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(403);
        }

        return $this->respond($response);
    }

    /**
    * Login api
    *
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        $response = [];

        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $response['token'] =  'Bearer '. $user->createToken('MyApp')-> accessToken;
                $response['message'] = 'User login successfully.';
                $response['user'] =  [
                   'name' => $user->name,
                   'email' => $user->email
                ];
            } else {
                return $this->throwValidation('Unauthorised.');
            }
        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(500);
        }

        return $this->respond($response);
    }

    public function logout(Request $request)
    {
        $response = [];

        try {
            $token = $request->user()->token();
            $token->revoke();
            $response = ['message' => 'You have been successfully logged out!'];
        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(500);
        }

        return response($response, 200);
    }

    /**
    * Logged in user details api
    *
    * @return \Illuminate\Http\Response
    */
    public function userDetails()
    {
        $response = [];

        try {

            $user = Auth::user();

            if ($user) {
                $response =  [
                   'name' => $user->name,
                   'email' => $user->email
                ];
            } else {
                return $this->throwValidation('Unauthorised.');
            }
        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(500);
        }

        return $this->respond($response);
    }
}
