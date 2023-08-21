@extends('layouts.template')
@section('content')

    <div class="col-lg-3">

        @if (session('success'))
            <div class="alert alert-success" role="alert">เพิ่มข้อมูลสำเร็จ</div>
        @endif

        @if (session('update'))
            <div class="alert alert-warning" role="alert">อัปเดทข้อมูลเรียบร้อย</div>
        @endif

        @if (session('delete'))
            <div class="alert alert-danger" role="alert">ลบข้อมูลเรียบร้อย</div>
        @endif


        <div class="card">
            <h5 class="card-header">เพิ่มการเช่า</h5>
            <div class="container">
                <form action="{{ route('bookings_add') }}" method="post">
                    <div class="row">

                        @csrf
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">เลือกรถ</label>
                                <select class="form-select" id="carSelect" name="cars_id"
                                        aria-label="Default select example">
                                    <option selected>กรุณาเลือกรถ</option>
                                    @foreach ($car as $item)
                                        <option value="{{$item->id}}">{{$item->brand}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">เลือกผู้จอง</label>
                                <select class="form-select" id="exampleFormControlSelect1" name="users_id"
                                        aria-label="Default select example">
                                    <option selected>กรุณาเลือกผู้จอง</option>
                                    @foreach ($users as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 ">
                                <label for="exampleFormControlSelect1" class="form-label">วัน-เวลาที่จอง</label>
                                <input class="form-control" type="datetime-local" value="2023-06-18T12:30:00"
                                       name="start"/>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 ">
                                <label for="exampleFormControlSelect1" class="form-label">วัน-เวลาที่คืน</label>
                                <input class="form-control" type="datetime-local" value="2023-06-18T12:30:00"
                                       name="end"/>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">

                                <input type="hidden" class="form-control" id="input"/>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">บัตรประชาชน</label>
                                <input type="text" class="form-control" name="number_id_img"/>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">ใบขับขี่</label>
                                <input type="text" class="form-control"  name="car_id_img"/>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">หลักฐานการโอนเงิน</label>
                                <input type="text" class="form-control" name="slip_id_img"/>
                            </div>
                        </div>
                        @error('users_id')
                        <div class="my-2">
                            <span class="text-danger my-2"> {{ $message }} </span>
                        </div>
                        @enderror
                        @error('cars_id')
                        <div class="my-2">
                            <span class="text-danger my-2"> {{ $message }} </span>
                        </div>
                        @enderror
                        @error('start')
                        <div class="my-2">
                            <span class="text-danger my-2"> {{ $message }} </span>
                        </div>
                        @enderror
                        @error('number_id_img')
                        <div class="my-2">
                            <span class="text-danger my-2"> {{ $message }} </span>
                        </div>
                        @enderror
                        @error('car_id_img')
                        <div class="my-2">
                            <span class="text-danger my-2"> {{ $message }} </span>
                        </div>
                        @enderror
                        @error('slip_id_img')
                        <div class="my-2">
                            <span class="text-danger my-2"> {{ $message }} </span>
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mb-2" >บันทึก</button>
                </form>

            </div>
        </div>

    </div>

    <div class="col-lg-9">

        @if (session('success'))
            <div class="alert alert-success" role="alert">เพิ่มข้อมูลสำเร็จ</div>
        @endif

        @if (session('update'))
            <div class="alert alert-warning" role="alert">อัปเดทข้อมูลเรียบร้อย</div>
        @endif

        @if (session('delete'))
            <div class="alert alert-danger" role="alert">ลบข้อมูลเรียบร้อย</div>
        @endif


        <div class="card">
            <h5 class="card-header">ข้อมูลการเช่า</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th style="text-align:center;">ยี่ห่อ - รุ่น</th>
                        <th style="text-align:center;">ทะเบียนรถ</th>
                        <th style="text-align:center;">ราคาเช่าทั้งหมด</th>
                        <th style="text-align:center;">รายละเอียด</th>
                        <th style="text-align:center;">ผู้เช่า</th>
                        <th style="text-align:center;">จัดการ</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($bookings as $item)

                    <tr>

                        <td> {{ $bookings->firstItem() + $loop->index }}</td>
                        <td style="text-align:center;">
                            @foreach($item->bookingtocars as $item1)
                                {{$item1->brand}}
                            @endforeach
                        </td>
                        <td style="text-align:center;">
                            @foreach($item->bookingtocars as $item1)
                                {{$item1->number_car}}
                            @endforeach
                        </td>
                        <td style="text-align:center;">
                            {{$item->all_price}} บาท

                        </td>

                        <td style="text-align:center;">
                            จำนวน {{$item->date}} วัน
                            <br>
                            จาก {{ date('d M Y H:i', strtotime($item->start)) }} ถึง {{ date('d M Y H:i', strtotime($item->end)) }}


                        </td>

                        <td style="text-align:center;">
                            @foreach($item->bookingtouser as $item1)
                                {{$item1->name}}
                            @endforeach
                        </td>
                        <td style="text-align:center;">

                            <button
                                type="button"
                                class="btn btn-success"
                                data-bs-toggle="modal"
                                data-bs-target="#basicModal2"
                            >
                                รายละเอียด
                            </button>

                            <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#basicModal1"
                            >
                                แก้ไข
                            </button>
                            <a href="#" class="btn btn-danger"
                               onclick="return confirm('ลบหรือไม่ ?')"> ลบข้อมูล</a>
                            <!-- Modal -->
                            <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">แก้ไขข้อมูลรถ</h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>

                                        </div>
                                        <div class="modal-body">
                                            <form action="#"
                                                  method="post">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-6 mb-6">
                                                        <label for="nameBasic" class="form-label">ยี่ห่อ - รุ่น</label>
                                                        <input type="text" name="brand" class="form-control"
                                                               placeholder="Honda" value=""/>
                                                    </div>
                                                    <div class="col-6 mb-6">
                                                        <label for="nameBasic" class="form-label">รายละเอียด</label>
                                                        <input type="text" name="detail" class="form-control"
                                                               placeholder="รายละเอียด" value=""/>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="row ">
                                                    <div class="col-4 mb-4">
                                                        <label for="nameBasic" class="form-label">ทะเบียนรถ</label>
                                                        <input type="text" name="number_car" class="form-control"
                                                               placeholder="กข123" value=""/>
                                                    </div>

                                                    <div class="col-4 mb-4">
                                                        <label for="emailBasic" class="form-label">เครื่องยนต์และมอเตอร์ไฟฟ้า</label>
                                                        <input type="text" name="electric_motor" class="form-control"
                                                               placeholder="V551" value=""/>
                                                    </div>


                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                        ปิด
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
