@extends('admin.admin_dashboard')
@section('admin')
<!-- Trong blade layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
      </div>
      
    </div>

    <div class="row">
      <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Dự án</h6>
                  
                </div>
                <div class="row">
                  
                  <div class=" " style="height:200px; width:400px">
                    <canvas style="height:200px; width:400px" id="myChart"></canvas>

                  </div>


                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Công việc</h6>
                  <div class="dropdown mb-2">
                    <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">35,084</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-danger">
                        <span>-2.8%</span>
                        <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Growth</h6>
                  <div class="dropdown mb-2">
                    <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">89.87%</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>+2.8%</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- row -->

   

    <div class="row">
      <div class="col-lg-7 col-xl-8 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Dự án chú ý</h6>
              
            </div>
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                    <th class="pt-0">Mã dự án</th>
                    <th class="pt-0">Tên dự án</th>
                    <th class="pt-0">Khởi công</th>
                    <th class="pt-0">Hoàn thành</th>
                    <th class="pt-0">Trạng thái</th>
                    <th class="pt-0">Giám sát</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($projects as $project)
                    @if($project->toggleStar==1)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $project->projectCode }}</td>
                      <td>{{ $project->projectName }}</td>
                      <td>{{ $project->startDate }}</td>
                      <td>{{ $project->endDate }}</td>
                      <td>@if($project->status == 1)   
                        Đã hoàn thành
  
                    @elseif($project->status ==2)
                        Tạm dừng
                    @elseif($project->status ==0)
                        Đang tiến hành
  
                    @elseif($project->status ==3)
                        Chậm tiến độ 
                    @endif</td>
                      <td>{{ $project->user->name }}</td>
                    </tr>
                    @endif
                  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> 
        </div>
      </div>
      <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Thông báo</h6>
              
            </div>
            <div class="d-flex flex-column">
              <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Leonardo Payne</h6>
                    <p class="text-muted tx-12">12.30 PM</p>
                  </div>
                  <p class="text-muted tx-13">Hey! there I'm available...</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Carl Henson</h6>
                    <p class="text-muted tx-12">02.14 AM</p>
                  </div>
                  <p class="text-muted tx-13">I've finished it! See you so..</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Jensen Combs</h6>
                    <p class="text-muted tx-12">08.22 PM</p>
                  </div>
                  <p class="text-muted tx-13">This template is awesome!</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Amiah Burton</h6>
                    <p class="text-muted tx-12">05.49 AM</p>
                  </div>
                  <p class="text-muted tx-13">Nice to meet you</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Yaretzi Mayo</h6>
                    <p class="text-muted tx-12">01.19 AM</p>
                  </div>
                  <p class="text-muted tx-13">Hey! there I'm available...</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      
    </div> <!-- row -->
    <div class="row mt-4">
      <div class="col-lg-7 col-xl-8 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Công việc chú ý</h6>
              
            </div>
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                    <th class="pt-0">Mã dự án</th>
                    <th class="pt-0">Tên dự án</th>
                    <th class="pt-0">Khởi công</th>
                    <th class="pt-0">Hoàn thành</th>
                    <th class="pt-0">Trạng thái</th>
                    <th class="pt-0">Giám sát</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($projects as $project)
                    @if($project->toggleStar==1)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $project->projectCode }}</td>
                      <td>{{ $project->projectName }}</td>
                      <td>{{ $project->startDate }}</td>
                      <td>{{ $project->endDate }}</td>
                      <td>@if($project->status == 1)   
                        Đã hoàn thành
  
                    @elseif($project->status ==2)
                        Tạm dừng
                    @elseif($project->status ==0)
                        Đang tiến hành
  
                    @elseif($project->status ==3)
                        Chậm tiến độ 
                    @endif</td>
                      <td>{{ $project->user->name }}</td>
                    </tr>
                    @endif
                  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> 
        </div>
      </div>
      <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Thông báo</h6>
              
            </div>
            <div class="d-flex flex-column">
              <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Leonardo Payne</h6>
                    <p class="text-muted tx-12">12.30 PM</p>
                  </div>
                  <p class="text-muted tx-13">Hey! there I'm available...</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Carl Henson</h6>
                    <p class="text-muted tx-12">02.14 AM</p>
                  </div>
                  <p class="text-muted tx-13">I've finished it! See you so..</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Jensen Combs</h6>
                    <p class="text-muted tx-12">08.22 PM</p>
                  </div>
                  <p class="text-muted tx-13">This template is awesome!</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Amiah Burton</h6>
                    <p class="text-muted tx-12">05.49 AM</p>
                  </div>
                  <p class="text-muted tx-13">Nice to meet you</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Yaretzi Mayo</h6>
                    <p class="text-muted tx-12">01.19 AM</p>
                  </div>
                  <p class="text-muted tx-13">Hey! there I'm available...</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      
    </div> <!-- row -->
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 <script>
    const inProgressProjects = {{ $inProgressProjects }};
    const onHoldProjects = {{ $onHoldProjects }};
    const lowProjects = {{ $lowProjects }};
    const successProjects = {{ $successProjects }}

    const pieChart = new Chart(
            document.getElementById('myChart'),
            {
                type: 'doughnut',
                data: {
                    labels: ['Đang tiến hành', 'đã hoàn thành', 'Chậm tiến độ','tạm dừng'],
                    datasets: [{
                        data: [inProgressProjects, successProjects, lowProjects, onHoldProjects],
                        backgroundColor: [
                            '#6571ff',
                            '#05a34a',
                            '#ff3366',
                            '#fbbc06'
                        ]
                    }]
                },
                options: {
                  aspectRatio: 2,
                  plugins: {
                      legend: {
                        display: true,
                        labels: {
                          color: '#000'
                        }
                      },
                      
                  }
                  
                }
            }
        );
 </script>
@endsection