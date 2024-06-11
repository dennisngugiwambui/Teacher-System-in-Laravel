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
    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['phone_number', 'employee_id']);

            // Find the teacher by phone number
            $teacher = Teacher::where('phone_number', $credentials['phone_number'])->first();

            if (!$teacher || !Hash::check($credentials['employee_id'], $teacher->employee_id)) {
//                return response()->json([
//                    'success' => false,
//                    'message' => 'Invalid credentials'
//                ], 401);

                Toastr::info('Invalid Credentials. Please enter correct credentials', 'error!!' ,["positionClass" => "toast-bottom-right"]);

                return redirect()->back()->with('error', 'Invavlid credentials');
            }

            // Generate a JWT token
            $token = JWTAuth::fromUser($teacher);

            // Generate an expiration time for the token (e.g., 1 hour)
            $expiration = now()->addHours(1)->timestamp;

            return response()->json([
                'success' => true,
                'token' => $token,
                'expires_at' => $expiration,
                'user' => $teacher,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ]);
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

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            Log::error('Error invalidating token: ' . $e->getMessage());
            return response()->json(['error' => 'Could not parse token']);
        }
    }
}
