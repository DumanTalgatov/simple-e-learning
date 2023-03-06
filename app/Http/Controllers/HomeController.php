<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            $course->author = User::find($course->user_id);
        }
        if ($courses->isEmpty()) {
            \Session::flash('course', 'No Courses Created.');
        }
        return view('courses', compact('courses'));
    }
}
