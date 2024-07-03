<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth:teacher');
    }

    public function profile(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();

        if (!$teacher || !$teacher->unique_id) {
            return redirect()->route('login');
        }

        return view('profile', ['unique_id' => $teacher->unique_id, 'teacher' => $teacher]);
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
