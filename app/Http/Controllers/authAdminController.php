<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
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
                'lever' => 1,
                'password' => Hash::make($request->get('password')),
                'token' => bin2hex(random_bytes(16)),
            ]);
            return redirect()->route('admin.login')->with('success','Đăng kí tài khoản thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.register')->with('error','Email Đã được sử dụng');
        }
    }
}
