@extends('layouts.template')
@section('content')

<div class="col-lg-12">

                <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#basicModal"
                        style="margin-bottom: 10px;"
                          >
                          เพิ่มพนักงาน
                </button>
                @if (session('success'))
                <div class="alert alert-success" role="alert">เพิ่มข้อมูลสำเร็จ</div>
             
                @endif

                @if (session('update'))
                <div class="alert alert-warning" role="alert">อัปเดทข้อมูลเรียบร้อย</div>
                @endif
                @if (session('delete'))
                <div class="alert alert-danger" role="alert">ลบข้อมูลเรียบร้อย</div>
                @endif


                    
                        <!-- Modal -->
                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">เพิ่มข้อมูลพนักงาน</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                           
                              </div>
                              <div class="modal-body">
                              <form action="{{ route('staff_add') }}"
                                                            method="post">
                                                            @csrf
                                <div class="row">
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">ชื่อ</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="ชื่อ" />
                              @error('first_name')
                              <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                              </div>
                              @enderror
                                  </div>
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">นามสกุล</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="นามสกุล" />
                              @error('last_name')
                              <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                              </div>
                              @enderror
                                  </div>
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">เบอร์โทร</label>
                                    <input type="text" id="tel" name="tel" class="form-control" placeholder="0901234561" />
                                    @error('tel')
                              <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                              </div>
                              @enderror
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">อีเมล์</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="xxxx@xxx.xx" />
                                    @error('email')
                              <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                              </div>
                              @enderror
                                  </div>
                                </div>
                                <div class="row">
                                <div class="col mb-0">
                                    <label for="dobBasic" class="form-label">รหัสผ่าน</label>
                                    <input type="text" id="dobBasic" name="password" class="form-control" placeholder="123456789" />
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
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>

                     
              
                        <div class="card">
                <h5 class="card-header">ข้อมูลพนักงาน</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th  style="text-align:center;">ชื่อ - นามสกุล</th>
                        <th style="text-align:center;">อีเมล์</th>
                        <th style="text-align:center;">เบอร์โทร</th>
                        <th style="text-align:center;">สถานะ</th>
                        <th style="text-align:center;">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        
                    @php
                    $i=1;
                    @endphp
                    @foreach ($staff as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td  style="text-align:center;">{{$item->first_name}}  {{$item->last_name}}</td>
                        <td style="text-align:center;">{{$item->email}}</td>
                        <td style="text-align:center;">{{$item->tel}}</td>
                        <td style="text-align:center;"><span class="badge bg-label-success me-1">พนักงาน</span></td>
                        <td  style="text-align:center;">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#basicModal1{{$item->id}}"
                        >
                          แก้ไข
                        </button>
                        <a href="{{ url('/staff/delete/' . $item->id) }}"class="btn btn-danger"
                                                onclick="return confirm('ลบหรือไม่ ?')"> ลบข้อมูล</a> 
                        <!-- Modal -->
                        <div class="modal fade" id="basicModal1{{$item->id}}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">แก้ไขข้อมูลพนักงาน</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                             
                              </div>
                              <div class="modal-body">
                              <form action="{{ url('/staff/update/' . $item->id) }}"
                                                            method="post">
                                                            @csrf
                                <div class="row">
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">ชื่อ</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{$item->first_name}}" />
                              @error('first_name')
                              <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                              </div>
                              @enderror
                                  </div>
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">นามสกุล</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{$item->last_name}}" />
                              @error('last_name')
                              <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                              </div>
                              @enderror
                                  </div>
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">เบอร์โทร</label>
                                    <input type="text" id="tel" name="tel" class="form-control" value="{{$item->tel}}" />
                                    @error('tel')
                              <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                              </div>
                              @enderror
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">อีเมล์</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{$item->email}}" disabled />
                                    @error('email')
                              <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                              </div>
                              @enderror
                                  </div>
                                </div>
                                <div class="row">
                                <div class="col mb-0">
                                    <label for="dobBasic" class="form-label">รหัสผ่าน</label>
                                    <input type="text" id="dobBasic" name="password" class="form-control" value="{{$item->password}}"  />
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