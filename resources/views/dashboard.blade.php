@extends('layouts.template')
@section('content')
 

<div class="col-lg-3 mb-4 order-0">
  <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          
                          </div>
                          <span class="fw-semibold d-block mb-1">ผู้ใช้งานทั้งหมด</span>
                          <h3 class="card-title mb-2">{{$totalUserProfile}} คน</h3>
                       
                        </div>
  </div>    
</div>

<div class="col-lg-3 mb-4 order-0">
  <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          
                          </div>
                          <span class="fw-semibold d-block mb-1">รถทั้งหมด</span>
                          <h3 class="card-title mb-2">{{$totalCar}} คัน</h3>
                       
                        </div>
  </div>    
</div>

<div class="col-lg-3 mb-4 order-0">
  <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          
                          </div>
                          <span class="fw-semibold d-block mb-1">รายการอนุมัติ</span>
                          <h3 class="card-title mb-2">{{$countStatusOneBookings}}รายการ</h3>
                       
                        </div>
  </div>    
</div>

<div class="col-lg-3 mb-4 order-0">
  <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          
                          </div>
                          <span class="fw-semibold d-block mb-1">รายการรอรับคืน</span>
                          <h3 class="card-title mb-2">{{$countStatusTreeBookings}} รายการ</h3>
                        </div>
  </div>    
</div>
@endsection