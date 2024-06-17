<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function profile(Request $request)
    {
        $Teacher = Teacher::find($id);

        // Check if the teacher exists
        if (!$Teacher) {
            Toastr::error('error trying to load profile!!','error!');
            return response()->json(['error' => 'Teacher not found'], 404)
        }

        return view('profile',  ['teacher' => $Teacher]);
    }
}
