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
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#basicModal1"
                        >
                          ดูข้อมูลลูกค้า
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">ข้อมูลลูกค้า</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-8 mb-8">
                                    <label for="nameBasic" class="form-label">ชื่อ</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{$item->name}}" disabled/>
                         
                                  </div>
                              
                                  
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">เบอร์โทร</label>
                                    <input type="text" id="tel" name="tel" class="form-control" value="{{$item->tel}}" disabled/>
                                   
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">อีเมล์</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{$item->email}}" disabled />
                                   
                                  </div>
                                </div>
                                <div class="row">
                                <div class="col mb-0">
                                    <label for="dobBasic" class="form-label">รหัสผ่าน</label>
                                    <input type="text" id="dobBasic" name="password" class="form-control" value="{{$item->password}}"  disabled/>
                                    @error('password')
                              <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                              </div>
                              @enderror
                                  </div>
                                </div>
                            
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  ปิด
                                </button>
                              
                              </div>
                              

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