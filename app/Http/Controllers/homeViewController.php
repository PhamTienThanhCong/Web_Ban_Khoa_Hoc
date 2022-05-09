<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeViewController extends Controller
{
    public function course(){
        return view('content.user.course');
    }

    public function viewCourse($course_id){
        return view('content.user.viewCourse');
    }

    public function myCourse(){
        return view('content.user.myCourse');
    }

    public function myCart(){
        return view('content.user.myCart');
    }
}
