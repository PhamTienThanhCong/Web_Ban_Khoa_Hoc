<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function login(){
        return view('content.user.login');
    }
    public function register(Request $request){
        try {
            $user = user::query()
            ->create([
                'name'  => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'token' => bin2hex(random_bytes(16)),
            ]);
            return redirect()->route('user.login')->with('success','Đăng kí tài khoản thành công');
        } catch (\Throwable $th) {
            return redirect()->route('user.login')->with('error','Email nãy lỗi hoặc Đã được sử dụng');
        }
    }
    public function loginProcessing(Request $request){
        try {
            $user = user::query()
                ->where('email', $request->get('email'))
                ->firstOrFail();
            if (!Hash::check($request->get('password'), $user->password)){ 
                return redirect()->route('user.login')->with('error-login','Tài khoản hoặc mật khẩu không đúng');
            }
            session()->put('login', 'true');
            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('image', $user->image);
            return redirect()->route('home.course');
        } catch (\Throwable $th) {
            return redirect()->route('user.login')->with('error-login','Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function logout(){
        session()->flush();
        return redirect()->route('home.course');
    }
    public function myAccount(){
        $user = user::query()
            ->select('users.email', DB::raw('COUNT(orders.id) as number_buy'), DB::raw('AVG(orders.price_buy) as total_price'))
            ->leftJoin('orders', 'users.id', 'orders.users_id')
            ->where('users.id', '=', session()->get('id'))
            ->groupBy('users.id')
            ->first();
        return view('content.user.myAccount',[
            'user' => $user,
        ]);
    }
}
