<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\lesson;
use App\Models\question;
use App\Models\result;
use App\Models\answer;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    public function overview(){
        $course = course::query()
                ->select(DB::raw('COUNT(orders.id) as number_order'), DB::raw('SUM(orders.price_buy) as total_price'), DB::raw('AVG(orders.rate) as number_rate'))
                ->leftJoin('orders' , 'courses.id', '=', 'orders.courses_id')
                ->where('id_admin', '=', session()->get('id'))
                ->first();

        $top_course = course::query()
                ->select('courses.id', 'courses.id_admin', 'courses.name', 'courses.price', 'courses.updated_at', DB::raw('COUNT(orders.id) as number_order'), DB::raw('AVG(orders.rate) as number_rate'))
                ->join('admins', 'courses.id_admin', '=', 'admins.id')
                ->leftJoin('orders', 'courses.id', '=', 'orders.courses_id')
                ->where('courses.id_admin', '=', session()->get('id'))
                ->where('courses.type', '=', '2')
                ->groupBy('courses.id')
                ->orderBy('number_order', 'DESC')
                ->limit(10)
                ->get();
        return view('content.seller.overView',[
            'url'       => $this->breadcrumb(),
            'course'    => $course,
            'top_course'=> $top_course,
        ]);
    }

    public function createCourse(){
        return view('content.seller.Course.addCourse',[
            'url' => $this->breadcrumb(),
        ]);
    
    }

    public function createCourseProcessing(Request $request){
        // try {
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
            return redirect()->route('seller.detailCourse', $course->id);
        // } catch (\Throwable $th) {
        //     return redirect()->route('seller.addCourse');
        // }
    }
    public function manageCourse(Request $request){
        $s = $request->get('search');
        $t = $request->get('check');

        if ($t == ""){ $t = "3"; }

        $Show = ["1","2"];
        
        if ($t != "3"){ $Show = [$t]; }
        
        $course = course::query()
            ->select('courses.*',DB::raw('COUNT(orders.id) as number_buy'))
            ->leftJoin('orders', 'courses.id', '=', 'orders.courses_id')
            ->where('courses.id_admin', '=', session()->get('id'))
            ->where('courses.name', 'like', "%".$s."%")
            ->whereIn('courses.type', $Show)
            ->groupBy('courses.id')
            ->paginate(10);
        $course->appends([
            'search' => $s,
            'check' => $t,
        ]);
        return view('content.seller.Course.managerCourse',[
            'url' => $this->breadcrumb(),
            'data' => $course,
            'type' => $t,
            'search' => $s,
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
                ->select('lessons.*',DB::raw('COUNT(questions.id) as number'))
                ->leftJoin('questions' , 'lessons.id', '=', 'questions.lessons_id')
                ->Where('courses_id', '=', $course)
                ->groupBy('lessons.id')
                ->get();

            $my_rate = order::query()
                ->select('orders.rate', 'orders.comment', 'orders.created_at', 'users.name')
                ->join('users','orders.users_id','=', 'users.id')
                ->where('orders.courses_id', '=', $course)
                ->where('orders.rate', '!=', 'null')
                ->get();

            $total_rate = 0;
            for ($i = 0; $i < count($my_rate); $i++) {
                $total_rate += $my_rate[$i]->rate;
            }
            return view('content.seller.Course.detailCourse', [
                'url'       => $this->breadcrumb(),
                'course'    => $course,
                'data'      => $my_course,
                'lesson'    => $my_lesson,
                'rates'     => $my_rate,
                'total_rate'=> $total_rate,
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
            'url' => $this->breadcrumb(),
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
                    'description'  => $request->get('description'),
                ]);
            if ($request->get('create_question') == null){
                return redirect()->route('seller.detailCourse', $course);
            }
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
            'url' => $this->breadcrumb(),
            'course' => $course,
            'lesson' => $lesson,
            'name_course' => $my_course->name,
            'name_lesson' => $my_lesson->name,
        ]);
    }
    public function createQuestionProcessing($course, $lesson, Request $request){
        $my_course = $this->getMyCourse($course);
        if (!isset($my_course->name)){
            dd("fail");
        }
        $my_lesson = $this->getMyLesson($course, $lesson);
        if (!isset($my_lesson->name)){
            dd("fail");
        }

        $type_question = $request->get('type_question');
        $question = question::query()
            ->create([
                'lessons_id' => $lesson,
                'question' => $request->get("q"),
                'type' => $type_question,
            ]);
        
        result::query()
            ->create([
                'questions_id' => $question->id,
            ]);

        $number_answer = $request->get('number_answer');
        for ($i = 1; $i <= $number_answer; $i++){
            answer::query()
                ->create([
                    'questions_id' => $question->id,
                    'answer' => $request->get("a".$i),
                    'check' => $request->get("check".$i),
                ]);
        }
        return redirect()->route('seller.questionManagement' , [$course, $lesson]);
    }
    public function manageQuestion($course, $lesson){
        $my_course = $this->getMyCourse($course);
        if (!isset($my_course->name)){
            dd("fail");
        }
        $my_lesson = $this->getMyLesson($course, $lesson);
        if (!isset($my_lesson->name)){
            dd("fail");
        }
        $result_question = question::query()
            ->join('results' , 'questions.id', '=', 'results.questions_id')
            ->leftJoin('answers' , 'questions.id', '=' , 'answers.questions_id')
            ->select('questions.*', 'results.number_true', 'results.number_false', 'answers.answer', 'answers.check')
            ->where('questions.lessons_id', '=', $lesson)
            ->get();
            
            $id = -2;
            $result_answer_true = [];
            $result_answer_false = [];
            foreach ($result_question as $result){
                if ($result->id != $id){
                    $id = $result->id;
                    array_push($result_answer_true, $result->number_true);
                    array_push($result_answer_false, $result->number_false);
                }
            }

        return view('content.seller.Course.questionManagement', [
            'url' => $this->breadcrumb(),
            'my_course' => $my_course,
            'my_lesson' => $my_lesson,
            'results_question' => $result_question,
            'number_true' => $result_answer_true,
            'number_false' => $result_answer_false,
        ]);
    }
}
