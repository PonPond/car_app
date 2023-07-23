@extends('layouts.template')
@section('content')

<div class="col-lg-12">


                <div class="card">
                <h5 class="card-header">ข้อมูลลูกค้า</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th  style="text-align:center;">ชื่อ - นามสกุล</th>
                        <th style="text-align:center;">อีเมล์</th>
                        <th>สถานะ</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        
                    @php
                    $i=1;
                    @endphp
                    @foreach ($users as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td  style="text-align:center;">{{$item->name}}</td>
                        <td style="text-align:center;">{{$item->email}}</td>
                        <td><span class="badge bg-label-success me-1">ผู้ใช้ทั่วไป</span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> แก้ไข</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> ลบ</a
                              >
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