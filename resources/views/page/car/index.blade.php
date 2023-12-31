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
                          เพิ่มข้อมูลรถ
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

    @if (session('error'))
        <div class="alert alert-danger" role="alert">ไม่สามารถลบข้อมูลได้ เนื่องจากรถมีการทำรายการเช่า</div>
    @endif

                        <!-- Modal -->
                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">เพิ่มข้อมูลรถ</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>

                              </div>
                              <div class="modal-body">
                              <form action="{{ route('car_add') }}" method="post"  enctype="multipart/form-data">
                              @csrf
                                <div class="row">
                                  <div class="col-6 mb-6">
                                    <label for="nameBasic" class="form-label"><b>*ยี่ห่อ</b></label>
                                    <select class="form-select" id="carSelect" name="brand"
                                        aria-label="Default select example">
                                    <option selected>กรุณาเลือกรถ</option>
                    
                                        <option value="Honda">Honda</option>
                                        <option value="Isuzu">Isuzu</option>
                                        <option value="Toyota">Toyota</option>
                                        <option value="Suzuki">Suzuki</option>
                                        <option value="Mitsubishi">Mitsubishi</option>
                                        <option value="Nissan">Nissan</option>
                                        <option value="Mazda">Mazda</option>
                                        <option value="Ford">Ford</option>
                                </select>
                                  </div>
                                  <div class="col-6 mb-6">
                                    <label for="nameBasic" class="form-label"><b>*รุ่น</b></label>
                                    <input type="text"  name="version" class="form-control" placeholder="รุ่น" />
                                  </div>

                                </div>
                                <br>
                                <div class="row ">
                                  <div class="col-6 mb-4">
                                    <label for="nameBasic" class="form-label"><b>*ทะเบียนรถ</b></label>
                                    <input type="text"  name="number_car" class="form-control" placeholder="กข123"  />
                                  </div>

                                  <div class="col-6 mb-4">
                                    <label for="emailBasic" class="form-label"><b>*ประเภทรถ</b></label>
                                    <select class="form-select" id="carSelect" name="category"
                                        aria-label="Default select example">
                                    <option selected>กรุณาเลือกประเภท</option>
                    
                                        <option value="เล็ก">เล็ก</option>
                                        <option value="กลาง">กลาง</option>
                                        <option value="ใหญ่">ใหญ่</option>
                                        <option value="รถมอเตอร์ไซค์">รถมอเตอร์ไซค์</option>
                                        <option value="รถตู้">รถตู้</option>
                                </select>

                                  </div>

                                
                                </div>

                                <div class="row ">
                                <div class="col-4 mb-4">
                                    <label for="emailBasic" class="form-label"><b>*สี</b></label>
                                    <input type="text"  name="colors" class="form-control" placeholder="แดง" />
                                  </div>
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label"><b>*ความจุ(คน)</b></label>
                                    <select class="form-select" id="carSelect" name="detail"
                                        aria-label="Default select example">
                                    <option selected>กรุณาเลือกความจุ</option>
                    
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                </select>
                                  </div>


                                  <div class="col-4 mb-4">
                                    <label for="emailBasic" class="form-label"><b>*ราคาเช่าต่อวัน</b></label>
                                    <input type="text"  name="price" class="form-control" placeholder="500" />
                                  </div>


                                </div>

                                <div class="row ">
                                  <div class="col-12 mb-4">
                                    <label for="nameBasic" class="form-label"><b>*รูปภาพ1</b></label>
    
                                    <input type="file" class="form-control" name="img1">

                                  </div>

                                  <div class="col-12 mb-4">
                                    <label for="nameBasic" class="form-label"><b>*รูปภาพ2</b></label>
                                    <input type="file"  name="img2" class="form-control"  />
                                  </div>

                                  <div class="col-12 mb-4">
                                    <label for="nameBasic" class="form-label"><b>*รูปภาพ3</b></label>
                                    <input type="file"  name="img3" class="form-control"  />
                                  </div>


                                </div>

                                @error('img1')
                            <div class="my-2">
                                <span class="text-danger my-2"> {{ $message }} </span>
                            </div>
                            @enderror

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


                        <div class="card">
                <h5 class="card-header">ข้อมูลพนักงาน</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th  style="text-align:center;">ยี่ห่อ - รุ่น</th>
                        <th style="text-align:center;">ทะเบียนรถ</th>
                        <th style="text-align:center;">ราคาเช่าต่อวัน</th>

                        <th style="text-align:center;">รายละเอียด</th>
                        <th style="text-align:center;">รูปภาพ</th>
                        <th style="text-align:center;">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    @php
                    $i=1;
                    @endphp

                    @foreach ($car as $item)
                      <tr>

                        <td>{{$i++}}</td>
                        <td  style="text-align:center;">{{$item->brand}}</td>
                        <td style="text-align:center;">{{$item->number_car}}</td>
                        <td style="text-align:center;">{{$item->price}} บาท</td>

                        <td style="text-align:center;">{{$item->detail}}</td>
                        <td style="text-align:center;"> <img src="{{$item->img1}}" alt="Chevrolet Corvette Stingray" style="width: 200px; height: 100px;"> </td>
                        <td  style="text-align:center;">

                        <button
                          type="button"
                          class="btn btn-success"
                          data-bs-toggle="modal"
                          data-bs-target="#basicModal2{{$item->id}}"
                        >
                          รายละเอียด
                        </button>

                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#basicModal1{{$item->id}}"
                        >
                          แก้ไข
                        </button>
                            <a href="{{ url('/car/delete/' . $item->id) }}"class="btn btn-danger"
                               onclick="return confirm('ลบหรือไม่ ?')"> ลบข้อมูล</a>
                            <!-- Modal -->
                        <div class="modal fade" id="basicModal1{{$item->id}}" tabindex="-1" aria-hidden="true">
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
                                <form action="{{ url('/car/update/' . $item->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                  <div class="col-6 mb-6">
                                    <label for="nameBasic" class="form-label">ยี่ห่อ</label>
                                    <select class="form-select" id="carSelect" name="brand"
                                        aria-label="Default select example">
                                    <option value="{{$item->brand}}" >{{$item->brand}}</option>
                    
                                        <option value="Honda">Honda</option>
                                        <option value="Isuzu">Isuzu</option>
                                        <option value="Toyota">Toyota</option>
                                        <option value="Suzuki">Suzuki</option>
                                        <option value="Mitsubishi">Mitsubishi</option>
                                        <option value="Nissan">Nissan</option>
                                        <option value="Mazda">Mazda</option>
                                        <option value="Ford">Ford</option>
                                </select>
                                  </div>
                                  <div class="col-6 mb-6">
                                    <label for="nameBasic" class="form-label">รุ่น</label>
                                    <input type="text"  name="version" class="form-control" value="{{$item->version}}" />
                                  </div>

                                </div>
                                <br>
                                <div class="row ">
                                  <div class="col-6 mb-4">
                                    <label for="nameBasic" class="form-label">ทะเบียนรถ</label>
                                    <input type="text"  name="number_car" class="form-control" value="{{$item->number_car}}"  />
                                  </div>

                                  <div class="col-6 mb-4">
                                    <label for="emailBasic" class="form-label">ประเภทรถ</label>
                                    <input type="text" name="category" class="form-control" value="{{$item->category}}" />
                                  </div>

                                
                                </div>

                                <div class="row ">
                                  <div class="col-4 mb-4">
                                    <label for="emailBasic" class="form-label">สี</label>
                                    <input type="text"  name="colors" class="form-control" value="{{$item->colors}}" />
                                  </div>
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">ความจุ</label>
                                    <input type="text" id="tel" name="detail" class="form-control" value="{{$item->detail}}" />
                                  </div>


                                  <div class="col-4 mb-4">
                                    <label for="emailBasic" class="form-label">ราคาเช่าต่อวัน</label>
                                    <input type="text"  name="price" class="form-control" value="{{$item->price}}" />
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-12 mb-4">
                                    <label for="nameBasic" class="form-label"><b>*รูปภาพ1</b></label>
                                    <input type="file"  name="img1" class="form-control"   />
                                    <input type="text"  name="img1_old" class="form-control"  value="{{$item->img1}}" />
                                    
                                    <br>
                                    <img src="{{$item->img1}}" alt="Chevrolet Corvette Stingray" style="width: 150px; height: 100px;">
                                  </div>
                                  <div class="col-12 mb-4">
                                    <label for="nameBasic" class="form-label"><b>*รูปภาพ2</b></label>
                                    <input type="file"  name="img2" class="form-control"   />
                                    <input type="text"  name="img2_old" class="form-control"  value="{{$item->img2}}" />
                                    <br>
                                    <img src="{{$item->img2}}" alt="Chevrolet Corvette Stingray" style="width: 150px; height: 100px;">
                                  </div>
                                  <div class="col-12 mb-4">
                                    <label for="nameBasic" class="form-label"><b>*รูปภาพ3</b></label>
                                    <input type="file"  name="img3" class="form-control"   />
                                    <input type="text"  name="img3_old" class="form-control"  value="{{$item->img3}}" />
                                    <br>
                                    <img src="{{$item->img3}}" alt="Chevrolet Corvette Stingray" style="width: 150px; height: 100px;">
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

                        <div class="modal fade" id="basicModal2{{$item->id}}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">รายละเอียดข้อมูลรถ</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>

                              </div>
                              <div class="modal-body">
                                <form action="{{ url('/car/update/' . $item->id) }}"
                                method="post">
                                @csrf
                                <div class="row">
                                  <div class="col-6 mb-6">
                                    <label for="nameBasic" class="form-label">ยี่ห่อ</label>
                                    <input type="text"  name="version" class="form-control" value="{{$item->brand}}" disabled />
                                 
                    
                                </select>
                                  </div>
                                  <div class="col-6 mb-6">
                                    <label for="nameBasic" class="form-label">รุ่น</label>
                                    <input type="text"  name="version" class="form-control" value="{{$item->version}}" disabled />
                                  </div>

                                </div>
                                <div class="row ">
                                  <div class="col-6 mb-4">
                                    <label for="nameBasic" class="form-label">ทะเบียนรถ</label>
                                    <input type="text"  name="number_car" class="form-control" value="{{$item->number_car}}" disabled />
                                  </div>

                                  <div class="col-6 mb-4">
                                    <label for="emailBasic" class="form-label">ประเภทรถ</label>
                                    <input type="text" name="category" class="form-control" value="{{$item->category}}" disabled />
                                  </div>

                                
                                </div>

                                <div class="row ">
                                  <div class="col-4 mb-4">
                                    <label for="emailBasic" class="form-label">สี</label>
                                    <input type="text"  name="colors" class="form-control" value="{{$item->colors}}" disabled/>
                                  </div>
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">ความจุ</label>
                                    <input type="text" id="tel" name="detail" class="form-control" value="{{$item->detail}}" disabled/>
                                  </div>


                                  <div class="col-4 mb-4">
                                    <label for="emailBasic" class="form-label">ราคาเช่าต่อวัน</label>
                                    <input type="text"  name="price" class="form-control" value="{{$item->price}}" disabled />
                                  </div>
                               
                                </div>

                                <div class="row ">
                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">รูปภาพ1</label>
                                  
                                    <br>
                                    <img src="{{$item->img1}}" alt="Chevrolet Corvette Stingray" style="width: 150px; height: 100px;">
                                  </div>

                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">รูปภาพ2</label>
                                  
                                    <br>
                                    <img src="{{$item->img2}}" alt="Chevrolet Corvette Stingray" style="width: 150px; height: 100px;">
                                  </div>

                                  <div class="col-4 mb-4">
                                    <label for="nameBasic" class="form-label">รูปภาพ3</label>
                                  
                                    <br>
                                    <img src="{{$item->img3}}" alt="Chevrolet Corvette Stingray" style="width: 150px; height: 100px;">
                                  </div>


                                </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  ปิด
                                </button>

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
