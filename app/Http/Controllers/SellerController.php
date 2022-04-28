<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function overview(){
        return view('content.seller.overView');
    }
    public function createCourse(){
        return view('content.seller.Course.addCourse');
    }
    public function createCourseProcessing(){
        // $filename = time().'.'.request()->image->getClientOriginalExtension();
        // request()->image->move(public_path('images'), $filename);
    }
    public function manageCourse(){
        return view('content.seller.Course.managerCourse');
    }

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
