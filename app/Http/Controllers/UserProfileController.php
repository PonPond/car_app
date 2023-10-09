<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $users = UserProfile::all();
        return view('page.users.index', compact('users'));

    }
    public function indexapi()
    {
    $userProfiles = UserProfile::all();
    return response()->json($userProfiles);
    }

    public function login(Request $request)
    {
        // ตรวจสอบข้อมูลที่รับมาจาก Request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid data'], 400);
        }
    
        // ค้นหาข้อมูลผู้ใช้จากฐานข้อมูล
        $user = UserProfile::where('email', $request->input('email'))->first();
    
        if (!$user) {
            // ไม่พบผู้ใช้
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        // เปรียบเทียบรหัสผ่าน (ไม่มีการเข้ารหัส) กับรหัสผ่านในฐานข้อมูล
        if ($request->input('password') !== $user->password) {
            // รหัสผ่านไม่ตรงกัน
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        // เข้าสู่ระบบสำเร็จ
        $responseData = [
            'id' => $user->id,
            'name' => $user->name,
            'tel' => $user->tel
        ];
    
        return response()->json(['user' => $responseData], 200);
    }
    




}
