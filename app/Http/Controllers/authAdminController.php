<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\course;
use Exception;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class authAdminController extends Controller
{
    public function register(Request $request){
        try {
            $admin = admin::query()
            ->create([
                'name'  => $request->get('name'),
                'email' => $request->get('email'),
                'description'  => $request->get('description'),
                'password' => Hash::make($request->get('password')),
                'token' => bin2hex(random_bytes(16)),
            ]);
            return redirect()->route('admin.login')->with('success','Đăng kí tài khoản thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.register')->with('error','Email Đã được sử dụng');
        }
    }
    public function login(Request $request){
        try {
            $admin = admin::query()
            ->where('email', $request->get('email'))
            ->firstOrFail();
            if (!Hash::check($request->get('password'), $admin->password)){
                return redirect()->route('admin.login')->with('error','Tài khoản hoặc mật khẩu không đúng');
            }
            if ($admin->lever == 0){
                return redirect()->route('admin.login')->with('success','Tài khoản của bạn đang chờ xác nhận, vui đăng nhập sau ');
            }
            session()->put('id', $admin->id);
            session()->put('name', $admin->name);
            session()->put('image', $admin->image);
            session()->put('lever', $admin->lever);
            if ($admin->lever == 2){
                return redirect()->route('admin.overview');
            }else if ($admin->lever == 1){
                return redirect()->route('seller.overview');
            }
        } catch (\Throwable $th) {
            return redirect()->route('admin.login')->with('error','Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function logout(){
        session()->flush();
        return redirect()->route('admin.login');
    }
    public function myAccount(){
        $admin = admin::query()
                ->select('admins.name', 'admins.email', 'admins.description', DB::raw('COUNT(courses.id) as number_course'))
                ->leftJoin('courses', 'admins.id', 'courses.id_admin')
                ->where('admins.id', '=', session()->get('id'))
                ->groupBy('admins.id')
                ->firstOrFail();
        $course = course::query()
                ->select(DB::raw('COUNT(orders.id) as number_order'), DB::raw('AVG(orders.rate) as number_rate'), DB::raw('SUM(orders.price_buy) as total_price'))
                ->leftJoin('orders' , 'courses.id', '=', 'orders.courses_id')
                ->where('courses.id_admin', '=', session()->get('id'))
                ->first();
        return view('content.seller.myAccount',[
            'url' => $this->breadcrumb(),
            'admin' => $admin,
            'course' => $course,
        ]);
    }
    public function updateMyAccount(Request $request){
        $admin = admin::find(session()->get('id'));
        if (!Hash::check($request->get('password'), $admin->password)){
            return redirect()->route('admin.myAccount')->with('error','Mật khẩu không đúng, vui lòng kiểm tra lại');
        }
        if (request()->image != null){
            $filename = $admin->name.'.'.time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images\avatar'), $filename);
            if ($admin->image != "avatar.jpg"){
                $nameDelete = public_path("images\avatar\\").$admin->image;
                File::delete($nameDelete);
            }
            $admin->image = $filename;
        }
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->description = $request->get('description');
        session()->put('id', $admin->id);
        session()->put('name', $admin->name);
        session()->put('image', $admin->image);
        session()->put('lever', $admin->lever);
        $admin->save();
        return redirect()->route('admin.myAccount')->with('success','Đổi thông tin tài khoản thành công');
    }
    public function updateMyPassword(Request $request){
        $admin = admin::find(session()->get('id'));
        if (!Hash::check($request->get('password'), $admin->password)){
            return redirect()->route('admin.myAccount')->with('error','Mật khẩu không đúng, vui lòng nhập lại để thay đổi');
        }
        $admin->password = Hash::make($request->get('password2'));
        $admin->save();
        return redirect()->route('admin.myAccount')->with('success','Đổi mật khẩu tài khoản thành công');
    }
}
