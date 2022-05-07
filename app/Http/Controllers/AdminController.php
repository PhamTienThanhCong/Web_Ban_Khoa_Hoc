<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function overview(){
        return view('content.admin.overView',[
            'url' => $this->breadcrumb(),
        ]);
    }
    public function mamagerCourses(){
        return view('content.admin.managerCourse',[
            'url' => $this->breadcrumb(),
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
            ->select('admins.id','admins.name','admins.image','admins.email','admins.lever','admins.income','admins.created_at', DB::raw('COUNT(admins.id) as number'))
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
            ->select('id','name','email','image','created_at')
            ->where('name', 'like', "%".$search."%")
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
        return view('content.admin.ViewSeller',[
            'url' => $this->breadcrumb(),
            'admin' => $admin,
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
}
