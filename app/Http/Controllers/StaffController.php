<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        return view('page.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:staff',
            'first_name' => 'required',
            'last_name' => 'required',
            'tel' => 'required',
            'password' => 'required',
        ],
            [
                'email.unique' => "email ซ้ำ",
                'first_name.required' => "กรุณากรอกชื่อ",
                'last_name.required' => "กรุณากรอกนามสกุล",
                'tel.required' => "กรุณากรอกเบอร์โทร",
                'password.required' => "กรุณากรอกรหัสผ่าน",
            ],

        );

        $staff = new Staff();
        $staff->email = $request->email;
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->tel = $request->tel;
        $staff->password = $request->password;
        $staff->save();

        return redirect()->route('index_staff')->with('success', "บันทึกข้อมูลเรียบร้อย");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
