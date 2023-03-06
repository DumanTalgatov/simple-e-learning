<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\Enrollment;
use App\Models\User;
use Auth;

class EnrollmentController extends Controller
{
    public function approve(User $user, Course $course)
    {
        $usercourse = UserCourse::create(
            [
                'user_id' => $user->id,
                'course_id' => $course->id,
                'course_enrolled' => 1,
                'course_completed' => 0
            ]
        );
        $usercourse->save();
        Enrollment::where('user_id', '=', $user->id)
                    ->where('course_id', '=', $course->id)
                    ->delete();
        \Session::flash('flash_message', 'The enrollment request has been approved');
        return redirect(route('dashboard'));
    }

    public function disapprove(User $user, Course $course)
    {
        $enrollment = Enrollment::where('user_id', '=', $user->id)
                    ->where('course_id', '=', $course->id)
                    ->delete();
        \Session::flash('flash_message', 'The enrollment request has been disapproved!');
        return redirect(route('dashboard'));
    }

    public function dashboard()
    {
        $user = Auth::user();
        $courses = Course::where('user_id', '=', $user->id);
        $courses = $courses->pluck('id')->all();
        $enrollments = Enrollment::whereIn('course_id', $courses)->get();
        return view('dashboard', compact('enrollments'));
    }
}
