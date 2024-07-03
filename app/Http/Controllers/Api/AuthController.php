<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Authlogin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone_number' => 'required',
                'employee_id' => 'required',
            ]);

            if ($validator->fails()) {
                Log::info('Validation failed: ', ['errors' => $validator->errors()]);
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $credentials = $request->only(['phone_number', 'employee_id']);

            $teacher = Teacher::where('phone_number', $credentials['phone_number'])
                ->where('employee_id', $credentials['employee_id'])
                ->first();

            if (!$teacher) {
                Log::info('Login failed: Invalid credentials');
                return redirect()->back()->with('error', 'Invalid credentials');
            }

            try {
                if (!$token = JWTAuth::fromUser($teacher)) {
                    return redirect()->back()->with('error', 'Invalid credentials');
                }
            } catch (JWTException $e) {
                Log::error('JWT Token not generated: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to generate token');
            }

            Log::info('Login successful: Token generated', ['token' => $token]);
            Toastr::success('Login successful', 'Success', ["positionClass" => "toast-bottom-right"]);

            // Store the token in a secure, HTTP-only cookie
            $cookie = cookie('jwt_token', $token, 60, null, null, true, true); // 60 minutes expiry, secure, HTTP-only

            // Store the token in the session as well
            session(['jwt_token' => $token]);

            return redirect()->route('home', ['unique_id' => $teacher->unique_id])->withCookie($cookie);
        } catch (Exception $e) {
            Log::error('Login error: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->with('error', 'An error occurred during login');
        }
    }
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'phone_number' => 'required|unique:teachers',
                'email' => 'required|email|unique:teachers',
                'employee_id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $encryptedPassword = Hash::make($request->employee_id);
            $teacher = new Teacher;

            $teacher->username = $request->username;
            $teacher->phone_number = $request->phone_number;
            $teacher->email = $request->email;
            $teacher->employee_id = $encryptedPassword;
            $teacher->save();

            return redirect()->route('username', ['username' => $teacher->username])->with('success', 'User registered successfully');
        } catch (Exception $e) {
            Log::error('Registration error: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function logout(Request $request)
    {
        try {
            if (Auth::check()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Toastr::success('Logout successful', 'success', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('index');
            } else {
                return response()->json(['error' => 'User is not authenticated'], 401);
            }
        } catch (Exception $e) {
            Log::error('Error during logout: ' . $e->getMessage());
            return response()->json(['error' => 'Logout failed'], 500);
        }
    }

//    public function logout(Request $request)
//    {
//        try {
//            Auth::logout();
//            Toastr::success('Logout successful', 'success', ["positionClass" => "toast-bottom-right"]);
//            return redirect()->route('index');
//        } catch (Exception $e) {
//            Log::error('Error invalidating token: ' . $e->getMessage());
//            return response()->json(['error' => 'Could not parse token']);
//        }
//    }



    public function login()
    {
        return view('welcome');
    }

    public function home()
    {
        $teacher = Auth::user();
        $unique_id = $teacher->unique_id;
        return view('home', ['unique_id' => $unique_id, 'teacher' => $teacher]);
    }
}
