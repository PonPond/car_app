<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $car = Car::all();
        return view('page.car.index', compact('car'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $request->validate([
            'number_car' => 'required|unique:cars',
            'brand' => 'required',
            'detail' => 'required',
            'price' => 'required',
          
        ],
            [
                'number_car.unique' => "ทะเบียนรถ ซ้ำ",
                'brand.required' => "กรุณากรอกยี่ห่อ",
                'detail.required' => "กรุณากรอกรายละเอียด",
                'price.required' => 'กรุณากรอกราคา',
            ],

        );

        $car = new Car();
        $car->brand = $request->brand;
        $car->detail = $request->detail;
        $car->number_car = $request->number_car;
        $car->power_system = $request->power_system;
        $car->battery = $request->battery;
        $car->electric_motor = $request->electric_motor;
        $car->steering = $request->steering;
        $car->car_system = $request->car_system;
        $car->anti_system = $request->anti_system;
        $car->mm = $request->mm;
        $car->price =$request->price;
        $car->img1 = $request->img1;
        $car->img2 = $request->img2;
        $car->img3 = $request->img3;
        $car->save();

        return redirect()->route('index_car')->with('success', "บันทึกข้อมูลเรียบร้อย");
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

     

     

     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


       
     
        $request->validate([
            'number_car' => 'required',
            'brand' => 'required',
            'detail' => 'required',
          
        ],
            [
                'number_car.unique' => "ทะเบียนรถ ซ้ำ",
                'brand.required' => "กรุณากรอกยี่ห่อ",
                'detail.required' => "กรุณากรอกรายละเอียด",
            
            ],

        );
      

        Car::find($id)->update([
      
         
           'brand' => $request->brand,
          'detail' => $request->detail,
           'number_car' => $request->number_car,
            'power_system' => $request->power_system,
           'battery' => $request->battery,
            'electric_motor' => $request->electric_motor,
           'steering' => $request->steering,
           'car_system' => $request->car_system,
           'anti_system' => $request->anti_system,
           'mm' => $request->mm,
           'price' =>$request->price,
           'img1' => $request->img1,
           'img2' => $request->img2,
           'img3' => $request->img3,
  

        ]);

        return redirect()->back()->with('update', "อัพเดตข้อมูลเรียบร้อย");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
