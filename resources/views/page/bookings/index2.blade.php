@extends('layouts.template')
@section('content')

    <div class="col-lg-12">

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
                        <th style="text-align:center;">สถานะ</th>
                     
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($bookings as $item)

                        <tr>

                            <td> {{ $bookings->firstItem() + $loop->index }}</td>
                            <td style="text-align:center;">
                                @foreach($item->bookingtocars as $item1)
                                    {{$item1->brand}}: {{$item1->version}}
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
                                จาก {{ date('d M Y H:i', strtotime($item->start)) }}
                                ถึง {{ date('d M Y H:i', strtotime($item->end)) }}


                            </td>

                            <td style="text-align:center;">
                                @foreach($item->bookingtouser as $item1)
                                    {{$item1->name}}
                                @endforeach
                            </td>

                            <td style="text-align:center;">


                                @if($item->status == 0)
                                    <span class="badge rounded-pill bg-label-warning">รออนุมัติ</span>
                                @elseif($item->status == 1)
                                    <span class="badge rounded-pill bg-label-success">อนุมัติ</span>
                                @elseif($item->status == 2)
                                    <span class="badge rounded-pill bg-label-danger">ไม่อนุมัติ</span>

                                    @elseif($item->status == 3)
                                        <span class="badge rounded-pill bg-label-info">คืนรถเรียบร้อย</span>
                                    @endif

                            </td>
                        
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $bookings->links('page.pagination.custom') }}
            </div>

        </div>

    </div>

@endsection
