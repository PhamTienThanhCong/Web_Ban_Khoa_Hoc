<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseSellerController extends Controller
{
    public function detailCourse($course){
        return view('content.seller.Course.detailCourse', [
            'course' => $course,
        ]);
    }
    public function createLesson($course){
        return view('content.seller.Course.addLesson', [
            'course' => $course,
        ]);
    }
    public function createQuestion($course, $lesson){
        return view('content.seller.Course.addQuestion', [
            'course' => $course,
        ]);
    }
    public function manageQuestion($course, $lesson){
        return view('content.seller.Course.questionManagement', [
            'course' => $course,
        ]);
    }
}
