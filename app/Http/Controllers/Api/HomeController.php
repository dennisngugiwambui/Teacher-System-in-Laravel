<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth:teacher');
//    }
    public function index(Request $request)
    {
        Log::info('Home route accessed', [
            'session_data' => session()->all(),
            'debug' => session('debug')
        ]);

        $teacher_id = session('teacher_id');

        if (!$teacher_id) {
            Log::error('No teacher_id in sessin')
            return redirect()->route('login')->with('error', 'Session expired. Please login again.');
        }

        $teacher = Teacher::find($teacher_id);

        if (!$teacher) {
            Log::error('Teacher not found', ['teacher_id' => $teacher_id]);
            return redirect()->route('login')->with('error', 'Invalid user. Please login again.');
        }

        Log::info('Home page rendered', ['teacher_id' => $teacher->id]);
        return view('home', ['teacher' => $teacher]);
    }

    public function profile(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();

        if (!$teacher || !$teacher->unique_id) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['teacher' => $teacher]);
    }

    public function leave(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();

        if (!$teacher || !$teacher->unique_id) {
            return redirect()->route('login');
        }

        return view('Leave');
    }

    public function students(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();

        if (!$teacher || !$teacher->unique_id) {
            return redirect()->route('login');
        }

        return view('student');
    }
}
