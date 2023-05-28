<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class userControllers extends Controller
{

    //returns all Users
    public function getAll()
    {
        $User =  User::all();

        if (count($User) > 0) {
            $respond = [
                'status' => 200,
                'message' => 'All Users',
                'data' => $User,
            ];
            return $respond;
        } else {
            $respond = [
                'status' => 401,
                'message' => 'No Users found',
                'data' => [],
            ];
            return $respond;
        }
    }

    //returns a single User based on the given id
    public function getOne($id)
    {
        $User = User::find($id);

        if ($User && is_string($User) === false) {
            $respond = [
                'status' => 200,
                'message' => 'User ',
                'data' => $User,
            ];
            return $respond;
        } else {
            $respond = [
                'status' => 401,
                'message' => 'User not found',
                'data' => null,
            ];
            return $respond;
        }
    }
    public function showCreateForm()
    {
        return view('register');
    }
    // signup
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'sex' => 'required',
            'role' => 'required',
            'blood_type' => 'required|string',
        ]);

        if ($validator->fails()) {
            $respond = [
                "status" => 401,
                "message" => $validator->errors()->first(),
                "data" => null
            ];

            return response($respond);
        } else {

            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'sex' => $request->get('sex'),
                'role' => $request->get('role'),
                'blood_type' => $request->get('blood_type'),
                'approved' => false,
            ]);

            $respond = [
                "status" => 200,
                "message" => "added successfully",
                "data" => $user
            ];
            return response($respond);
        }
    }

    // edit user
    public function editUser(Request $request, $id)
    {
        $User = User::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'sex' => 'required',
            'role' => 'required',
            'blood_type' => 'required|string',
            'approve' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            $respond = [
                'status' => 401,
                'message' =>  $validator->errors()->first(),
                'data' => null,
            ];

            return $respond;
        }

        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->get('password'));
        $User->sex = $request->sex;
        $User->role = $request->role;
        $User->blood_type = $request->blood_type;
        $User->approve = $request->approve;
        $User->save();

        return $User;
    }

    //Delete an User
    public function delete($id)
    {
        $User = User::find($id);
        if (isset($User)) {
            $User->delete();
            $respond = [
                'status' => 200,
                'message' => 'User deleted',
                'data' => $User,
            ];
            return $respond;
        } else {
            $respond = [
                'status' => 401,
                'message' => 'User not found',
                'data' => null,
            ];
            return $respond;
        }
    }

    public function showLoginForm()
    {
        return view('login');
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return view('login')->with('token', $token);
    }


    // logOut
    public function logout()
    {
        Auth::logout();

        if (Auth::check())
            $msg = "The user is still logged in";
        else
            $msg = "The user is successfully logged out";

        return response()->json(['message' => $msg]);
    }

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('approve-users', function ($user) {
            return $user->role === 'admin';
        });
    }
}
