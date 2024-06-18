<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;  // Use the Teachers model instead of User model
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{

    public function Authlogin(Request $request)
    {
        try {
            $credentials = $request->only(['phone_number', 'employee_id']);
            $teacher = Teacher::where('phone_number', $credentials['phone_number'])->first();

            if (!$teacher || $teacher->employee_id != $credentials['employee_id']) {
                Toastr::info('Invalid Credentials. Please enter correct credentials', 'error!!', ["positionClass" => "toast-bottom-right"]);
                Log::info('Login failed: Invalid credentials');
                return redirect()->back()->with('error', 'Invalid credentials');
            }

            $token = JWTAuth::fromUser($teacher);

            if (!$token) {
                Log::error('JWT Token not generated');
                return redirect()->back()->with('error', 'Failed to generate token');
            }

            Toastr::success('Login successful', 'success', ["positionClass" => "toast-bottom-right"]);
            Log::info('Login successful: Token generated', ['token' => $token]);

            $cookie = cookie('token', $token, 15); // 15 minutes expiry
            Log::info('Redirecting to home with cookie', ['cookie' => $cookie]);

            return redirect()->route('home', ['unique_id' => $teacher->unique_id])->withCookie($cookie);

        } catch (Exception $e) {
            Log::error('Login error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred during login',
            ], 500);
        }
    }


    public function register(Request $request)
    {
        $encryptedPassword = Hash::make($request->employee_id);

        $teacher = new Teacher;

        try {
            $teacher->username = $request->username;
            $teacher->phone_number = $request->phone_number;
            $teacher->email = $request->email;
            $teacher->employee_id = $encryptedPassword;
            $teacher->save();

            return redirect()->route('username', ['username' => $teacher->username])->with('success', 'User logged in successfully');
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            // Invalidate the token
            Auth::logout();

            Toastr::success('logout successful', 'success',  ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('index');
        } catch (Exception $e) {
            Log::error('Error invalidating token: ' . $e->getMessage());
            return response()->json(['error' => 'Could not parse token']);
        }
    }

    public function login()
    {
        return view('welcome');
    }


    public function home(Request $request)
    {
        $teacher = Auth::user();
        return view('home', ['unique_id' => $teacher->unique_id]);
    }

}
