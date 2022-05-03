<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\lesson;
use App\Models\question;
use App\Models\result;
use App\Models\answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    public function overview(){
        return view('content.seller.overView',[
            'url' => $this->breadcrumb(),
        ]);
    }

    public function createCourse(){
        return view('content.seller.Course.addCourse',[
            'url' => $this->breadcrumb(),
        ]);
    
    }

    public function breadcrumb(){
        $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" ."/". $crumbs[1];
        // $url = $request->getHttpHost() ."". $crumbs[1];
        $urlCrumbs = [array(
            "url" => $url,
            "name" => "none",
        )];
        for ($i = 2; $i < count($crumbs) ; $i++){
            array_push($urlCrumbs, 
            array(
                "url" => $urlCrumbs[$i-2]["url"] ."/". $crumbs[$i],
                "name" => $crumbs[$i],
            ));
        }
        return $urlCrumbs;
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
            'url' => $this->breadcrumb(),
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
                ->select('lessons.*',DB::raw('COUNT(questions.id) as number'))
                ->leftJoin('questions' , 'lessons.id', '=', 'questions.lesson_id')
                ->Where('courses_id', '=', $course)
                ->groupBy('lessons.id')
                ->get();
            return view('content.seller.Course.detailCourse', [
                'url' => $this->breadcrumb(),
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
                'lesson_id' => $lesson,
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
            ->where('questions.lesson_id', '=', $lesson)
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
