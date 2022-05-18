<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\course;
use App\Models\lesson;
use App\Models\order;
use App\Models\question;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function overview(){
        $course = course::query()
                ->select(DB::raw('COUNT(orders.id) as number_order'), DB::raw('SUM(orders.price_buy) as total_price'))
                ->leftJoin('orders' , 'courses.id', '=', 'orders.courses_id')
                ->first();
        $user = user::query()
                ->select(DB::raw('COUNT(*) as total_user'))
                ->first();
        $top_admin = admin::query()
                ->select('admins.id', 'admins.name', 'admins.email','admins.image', 'admins.created_at', DB::raw('COUNT(orders.id) as number_order'), DB::raw('SUM(orders.price_buy) as total_price'), DB::raw('AVG(orders.rate) as number_rate'))
                ->leftJoin('courses' , 'admins.id', '=', 'courses.id_admin')
                ->leftJoin('orders' , 'courses.id', '=', 'orders.courses_id')
                ->where('admins.lever', '=', '1')
                ->groupBy('admins.id')
                ->orderBy('total_price', 'DESC')
                ->limit(10)
                ->get();       
        $top_course = course::query()
                ->select('admins.name as name_admin', 'courses.id', 'courses.id_admin', 'courses.name', 'courses.price', 'courses.updated_at', DB::raw('COUNT(orders.id) as number_order'), DB::raw('AVG(orders.rate) as number_rate'))
                ->join('admins', 'courses.id_admin', '=', 'admins.id')
                ->leftJoin('orders', 'courses.id', '=', 'orders.courses_id')
                ->where('admins.lever', '=', '1')
                ->where('courses.type', '=', '2')
                ->groupBy('courses.id')
                ->orderBy('number_order', 'DESC')
                ->limit(10)
                ->get();
        return view('content.admin.overView',[
            'url'           => $this->breadcrumb(),
            'course'        => $course,
            'number_user'   => $user->total_user,
            'top_admin'     => $top_admin,
            'top_course'    => $top_course,
        ]);
    }
    public function managerSeller(Request $request){
        $s = $request->get('search');
        $t = $request->get('check');

        if ($t == "4"){ $t = "0"; }

        $Show = ["0","1","3"];
        
        if ($t == ""){ $t = "2"; }
        if ($t != "2"){ $Show = [$t]; }
        if ($t == "0"){ $t = "4"; }
        
        $admin = DB::table('admins')
            ->leftJoin('courses' , 'admins.id', '=', 'courses.id_admin')
            ->select('admins.id','admins.name','admins.image','admins.email','admins.lever','admins.created_at', DB::raw('COUNT(admins.id) as number'))
            ->where('admins.name', 'like', "%".$s."%")
            ->whereIn('admins.lever', $Show)
            ->groupBy('admins.id')
            ->paginate(10);

        $admin->appends([
           'search' => $s,
           'check' => $t,
        ]);
        
        return view('content.admin.managerSeller',[
            'url' => $this->breadcrumb(),
            'data' => $admin,
            'search' => $s,
            'type' => $t,
        ]);
    }
    public function managerUser(Request $request){
        $search = $request->get('search');

        $user = DB::table('users')
            ->select('users.id','users.name','users.email','users.image','users.created_at',DB::raw('COUNT(orders.id) as number_order'))
            ->leftJoin('orders', 'users.id', 'orders.users_id')
            ->where('users.name', 'like', "%".$search."%")
            ->groupBy('users.id')
            ->paginate(10);

        $user->appends([
           'search' => $search,
        ]);
        return view('content.admin.managerUser',[
            'url' => $this->breadcrumb(),
            'data' => $user,
            'search' => $search,
        ]);
    }
    public function viewSeller($seller){
        $admin =  admin::query()
                ->select('admins.*',DB::raw('COUNT(courses.id) as number_courses'))
                ->leftJoin('courses' , 'admins.id', '=', 'courses.id_admin')
                ->where('admins.id', '=', $seller)
                ->groupBy('admins.id')
                ->firstOrFail();
        $course = course::query()
                ->select(DB::raw('COUNT(orders.id) as number_order'), DB::raw('AVG(orders.rate) as number_rate'), DB::raw('SUM(orders.price_buy) as total_price'))
                ->leftJoin('orders' , 'courses.id', '=', 'orders.courses_id')
                ->where('courses.id_admin', '=', $seller)
                ->first();
        return view('content.admin.ViewSeller',[
            'url'       => $this->breadcrumb(),
            'admin'     => $admin,
            'course'    => $course,
        ]);
    }
    public function updateSeller($seller, $type, $token){
        $admin = admin::find($seller);
        if ($type != 1 && $type != 4 && $type != 3){
            return redirect()->route('admin.viewSeller',$seller)->with('error','Lỗi cập nhập');
        }
        if ($admin->token == $token){
            $admin->lever = $type;
            $admin->save();
        }
        return redirect()->route('admin.viewSeller',$seller)->with('success','Cập nhập thành công');
    }
    public function mamagerCourses(Request $request, $name_admin = ""){
        $part = $this->breadcrumb();
        $part[2]['name'] = $name_admin;

        $s = $request->get('search');
        $t = $request->get('check');

        if ($t == ""){ $t = "3"; }

        $Show = ["1","2"];
        
        if ($t != "3"){ $Show = [$t]; }
        
        $course = course::query()
            ->select('courses.*','admins.name as name_admin', DB::raw('COUNT(orders.id) as number_buy'))
            ->join('admins', 'courses.id_admin', '=', 'admins.id')
            ->leftJoin('orders', 'courses.id', '=', 'orders.courses_id')
            ->where('courses.name', 'like', "%".$s."%")
            ->where('admins.name', 'like', "%".$name_admin."%")
            ->whereIn('courses.type', $Show)
            ->groupBy('courses.id')
            ->paginate(10);
        $course->appends([
            'search' => $s,
            'check' => $t,
        ]);
        return view('content.seller.Course.managerCourse',[
            'url' => $part,
            'data' => $course,
            'type' => $t,
            'search' => $s,
        ]);
    }
    public function mamagerDetailCourses($name_admin,$course){
        $part = $this->breadcrumb();
        $part[2]['name'] = $name_admin;

        $my_course = course::find($course);
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
        $total_rate = $total_rate/count($my_rate);
        return view('content.seller.Course.detailCourse', [
            'name_admin'    => $name_admin,
            'url'           => $part,
            'course'        => $course,
            'data'          => $my_course,
            'lesson'        => $my_lesson,
            'rates'          => $my_rate,
            'total_rate'    => $total_rate,
        ]);
    }
    public function acceptCourse($name_admin, $course, $type){
        $my_course = course::find($course);
        $my_course->type = $type;
        $my_course->save();

        return redirect()->route('admin.mamagerDetailCourses',[$name_admin, $course])->with('success','Cập nhập thành công');
    }
    public function viewLesson($name_admin,$course,$lesson){
        $my_course = course::find($course);
        $my_lesson = lesson::find($lesson);
        
        $part = $this->breadcrumb();
        $part[2]['name'] = $name_admin;

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
            'url' => $part,
            'my_course' => $my_course,
            'my_lesson' => $my_lesson,
            'results_question' => $result_question,
            'number_true' => $result_answer_true,
            'number_false' => $result_answer_false,
        ]);
    }
}
