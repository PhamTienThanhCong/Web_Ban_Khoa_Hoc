<?php

namespace App\Http\Controllers;

use App\Models\course;
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

    public function detailCourse($course){
        try {
            $my_course = course::query()
                ->select('*')
                ->where('id_admin', '=', Session::get('id'))
                ->Where('id', '=', $course)
                ->first();
            if (isset($my_course->name)){
                dd("true");
            }
            $my_lesson = course::query()
                ->select('*')
                ->where('id_admin', '=', Session::get('id'))
                ->Where('id', '=', $course)
                ->first();
            return view('content.seller.Course.detailCourse', [
                'course' => $course,
                'data' => $my_course,
            ]);
        } catch (\Throwable $th) {
            dd("Loi");
        }
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
