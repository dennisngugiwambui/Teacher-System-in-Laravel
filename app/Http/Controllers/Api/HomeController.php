<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function profile(Request $request)
    {
        $teacher = Auth::user();
        $unique_id = $teacher->unique_id;

        return view('profile', ['unique_id' => $unique_id, 'teacher' => $teacher]);
    }
}
