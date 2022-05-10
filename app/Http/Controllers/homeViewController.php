<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeViewController extends Controller
{
    public function course(){
        $course = course::query()
            ->select('courses.*','admins.name as name_admin',DB::raw('COUNT(lessons.courses_id) as number_lesson'))
            ->join('admins', 'courses.id_admin', '=', 'admins.id')
            ->leftJoin('lessons' , 'courses.id', '=', 'lessons.courses_id')
            ->where('courses.type', '=', '2')
            ->groupBy('courses.id')
            ->paginate(12);;
        return view('content.user.course',[
            'courses' => $course,
        ]);
    }

    public function viewCourse($course_id){
        $course = course::query()
            ->select('courses.*','admins.name as name_admin','admins.image as avatar',DB::raw('COUNT(lessons.courses_id) as number_lesson'))
            ->join('admins', 'courses.id_admin', '=', 'admins.id')
            ->leftJoin('lessons' , 'courses.id', '=', 'lessons.courses_id')
            ->where('courses.type', '=', '2')
            ->where('courses.id', '=', $course_id)
            ->groupBy('courses.id')
            ->firstOrFail();
        $lessons = lesson::query()
            ->select('*')
            ->where('courses_id', '=', $course_id)
            ->get();
        return view('content.user.viewCourse',[
            'courses' => $course,
            'lessons' => $lessons,
        ]);
    }

    public function myCourse(){
        $course = course::query()
            ->select('courses.*','admins.name as name_admin',DB::raw('COUNT(lessons.courses_id) as number_lesson'))
            ->join('admins', 'courses.id_admin', '=', 'admins.id')
            ->join('orders', 'courses.id', '=', 'orders.id')
            ->leftJoin('lessons' , 'courses.id', '=', 'orders.courses_id')
            ->where('courses.type', '=', '2')
            ->where('orders.users_id', '=', session()->get('id'))
            ->groupBy('courses.id')
            ->paginate(12);

        return view('content.user.myCourse',[
            'courses' => $course,
        ]);
    }

    public function myCart(){
        return view('content.user.myCart');
    }
}
