<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use App\Models\UserProfile;
use Carbon\Carbon;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car = Car::all();
        $users = UserProfile::all();

        $bookings = Booking::orderBy('created_at', 'desc')->paginate(2);
        return view('page.bookings.index', compact('bookings','car','users'));
    }



  public function getback()
    {
        $car = Car::all();
        $users = UserProfile::all();
        $bookings = Booking::where('status', 1)->paginate(15);
        $getback= Booking::where('status', 3)->paginate(15);
        return view('page.getback.index', compact('bookings','car','users','getback'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'cars_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'number_id_img' => 'required',
            'car_id_img' => 'required',
            'slip_id_img' => 'required',

        ],
            [
                'users_id.required' => "กรุณากรอกผู้ใช้",
                'cars_id.required' => "กรุณากรอกรถยนต์",
                'start.required' => "กรุณากรอกเวลาเริ่มเช่า",
                'end.required' => 'กรุณากรอกเวลาคืนรถ',
                'number_id_img.required' => "กรุณากรอกบัตรประชาชน",
                'car_id_img.required' => "กรุณากรอกใบขับขี่",
                'slip_id_img.required' => 'กรุณากรอกหลักฐานการโอนเงิน',
            ],

        );

        $startDateTime = Carbon::parse($request->start);
        $endDateTime = Carbon::parse($request->end);
        $daysDifference = $endDateTime->diffInDays($startDateTime);

        $cars = Car::find($request->cars_id);

        $booking = new Booking();
        $booking->users_id = $request->users_id;
        $booking->cars_id = $request->cars_id;
        $booking->start = $request->start;
        $booking->end = $request->end;
        $booking->date =$daysDifference;
        $booking->all_price = $cars->price*$daysDifference;
        $booking->number_id_img = $request->number_id_img;
        $booking->car_id_img = $request->car_id_img;
        $booking->slip_id_img = $request->slip_id_img;


        $booking->save();

        return redirect()->route('index_bookings')->with('success', "บันทึกข้อมูลเรียบร้อย");
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
        $request->validate([
            'status' => 'required',


        ],
            [
                'status.unique' => "กรุณากรอกสถานะ",
            ],

        );


        Booking::find($id)->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('update', "อัพเดตข้อมูลเรียบร้อย");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $delete = Booking::find($id)->delete();
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }
}
