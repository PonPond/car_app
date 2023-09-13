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
        $client = new Client();

        if ($request->hasFile('img1')) {
            $file = $request->file('img1');
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
            $urls1 = $responseData['data']['url'];
        } else {
            return response()->json(['error' => 'No files found in the request'], 400);
        }

        if ($request->hasFile('img2')) {
            $file = $request->file('img2');
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
            $urls2 = $responseData['data']['url'];
        } else {
            return response()->json(['error' => 'No files found in the request'], 400);
        }
        
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
            $urls3 = $responseData['data']['url'];
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
        $car->img1 = $urls1[0];
        $car->img2 = $urls2[0];
        $car->img3 = $urls3[0];
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
