<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    public function overview(){
        return view('content.seller.overView');
    }
    public function createCourse(){
        return view('content.seller.Course.addCourse');
    }
    public function createCourseProcessing(Request $request){
        try {
            $filename = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $filename);
            $course = course::query()
                ->create([
                    'id_admin' => Session::get('id'),
                    'name'  => $request->get('name'),
                    'price'  => $request->get('price'),
                    'image'  => $filename,
                    'price'  => $request->get('price'),
                    'description'  => $request->get('description'),
                ]);
            return redirect()->route('seller.managerCourse');
        } catch (\Throwable $th) {
            return redirect()->route('seller.addCourse');
        }
    }
    public function manageCourse(){
        $course = course::query()
            ->select('*')
            ->where('id_admin', '=', Session::get('id'))
            ->paginate(10);
        return view('content.seller.Course.managerCourse',[
            'data' => $course,
        ]);
    }
    public function getMyCourse($course){
        $my_course = course::query()
            ->select('*')
            ->where('id_admin', '=', Session::get('id'))
            ->Where('id', '=', $course)
            ->first();
        return $my_course;
    }
    public function getMyLesson($course_id,$lesson_id){
        $my_lesson = lesson::query()
            ->select('*')
            ->where('id', '=', $lesson_id)
            ->where('courses_id', '=', $course_id)
            ->first();
        return $my_lesson;
    }
    public function detailCourse($course){
        $my_course = $this->getMyCourse($course);
        if (!isset($my_course->name)){
            dd("fail");
        }
        try {
            $my_lesson = lesson::query()
                ->select('*')
                ->Where('courses_id', '=', $course)
                ->get();
            return view('content.seller.Course.detailCourse', [
                'course' => $course,
                'data' => $my_course,
                'lesson' => $my_lesson,
            ]);
        } catch (\Throwable $th) {
            dd("Loi");
        }
    }
    public function createLesson($course){
        $my_course = $this->getMyCourse($course);
        if (!isset($my_course->name)){
            dd("fail");
        }
        return view('content.seller.Course.addLesson', [
            'course' => $course,
            'name_course' => $my_course->name,
        ]);
    }
    
    public function createLessonProcessing($course,Request $request){
        $my_course = $this->getMyCourse($course);
        if (!isset($my_course->name)){
            dd("fail");
        }
        try {
            $lesson = lesson::query()
                ->create([
                    'courses_id' => $course,
                    'name'  => $request->get('name'),
                    'link' => $request->get('link'),
                    'type_link' => $request->get('type_link'),
                    'description'  => $request->get('description'),
                ]);
            return redirect()->route('seller.addQuestion', [$course, $lesson->id]);  
        } catch (\Throwable $th) {
            dd("error");
        }
    }
    public function createQuestion($course, $lesson){
        $my_course = $this->getMyCourse($course);
        if (!isset($my_course->name)){
            dd("fail");
        }
        $my_lesson = $this->getMyLesson($course, $lesson);
        if (!isset($my_lesson->name)){
            dd("fail");
        }
        return view('content.seller.Course.addQuestion', [
            'course' => $course,
            'name_course' => $my_course->name,
            'name_lesson' => $my_lesson->name,
        ]);
    }
    public function manageQuestion($course, $lesson){
        return view('content.seller.Course.questionManagement', [
            'course' => $course,
        ]);
    }
}
