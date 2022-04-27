<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function overview(){
        return view('content.admin.overView');
    }
    public function mamagerCourses(){
        return view('content.admin.managerCourse');
    }
    public function managerSeller(Request $request){
        $s = $request->get('search');
        $t = $request->get('check');

        if ($t == "4"){ $t = "0"; }

        $Show = ["0","1","3"];
        
        if ($t != ""){ $Show = [$t]; }
        if ($t == "0"){ $t = "4"; }
        
        $admin = DB::table('admins')
            ->select('id','name','image','lever','income','created_at')
            ->where('name', 'like', "%".$s."%")
            ->whereIn('lever', $Show)
            ->paginate(10);

        $admin->appends([
           'search' => $s,
           'check' => $t,
        ]);
        
        return view('content.admin.managerSeller',[
            'data' => $admin,
            'search' => $s,
            'type' => $t,
        ]);
    }
    public function managerUser(){
        return view('content.admin.managerUser');
    }
}
