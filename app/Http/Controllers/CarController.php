<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Utils;

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

        $room_image = $request->file('img1');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($room_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $upload_location = 'img/car/';
        $full_path1 = $upload_location . $img_name;
        #2

        $room_image2 = $request->file('img2');
        $name_gen2 = hexdec(uniqid());
        $img_ext2 = strtolower($room_image2->getClientOriginalExtension());
        $img_name2 = $name_gen2 . '.' . $img_ext2;
        $upload_location2 = 'img/car/';
        $full_path2 = $upload_location2 . $img_name2;

        #3
        // $room_image3 = $request->file('img3');
        // $name_gen3 = hexdec(uniqid());
        // $img_ext3 = strtolower($room_image3->getClientOriginalExtension());
        // $img_name3 = $name_gen3 . '.' . $img_ext3;
        // $upload_location3 = 'img/car/';
        // $full_path3 = $upload_location3 . $img_name3;
        
        $client = new Client();
        if ($request->hasFile('img3')) {
            $file = $request->file('img3');

            $options = [
                'multipart' => [
                    [
                        'name' => 'status',
                        'contents' => 'active'
                    ],
                    [
                        'name' => 'file[]',
                        'contents' => fopen($file->getRealPath(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                        'headers' => [
                            'Content-Type' => $file->getClientMimeType()
                        ]
                    ]
                ]
            ];

            $guzzleRequest = new GuzzleRequest('POST', 'http://154.26.133.10:8808/api/v1/medias');
            $response = $client->send($guzzleRequest, $options);
            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);
            $urls = $responseData['data']['url'];


        } else {
            return response()->json(['error' => 'No files found in the request'], 400);
        }


        $car = new Car();
        $car->brand = $request->brand;
        $car->detail = $request->detail;
        $car->number_car = $request->number_car;
        $car->version = $request->version;
        $car->category = $request->category;
        $car->colors = $request->colors;
        $car->price =$request->price;
        $car->img1 = $full_path1;
        $car->img2 = $full_path2;
        $car->img3 = $urls[0];
        $car->save();


        $room_image->move($upload_location, $img_name);
        $room_image2->move($upload_location, $img_name2);


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
            'version' => $request->version,
           'category' => $request->category,
            'colors' => $request->colors,
           'price' => $request->price,
           'img1' => $request->img1,
           'img2' => $request->img2,
           'img3' => $request->img3,
    
        


        ]);

        return redirect()->back()->with('update', "อัพเดตข้อมูลเรียบร้อย");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $delete = Car::find($id)->delete();
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }
}
