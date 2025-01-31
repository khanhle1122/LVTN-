@extends('admin.admin_dashboard')
@section('admin')
<!-- Trong blade layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<div class="page-content">
  <div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow-1">
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Dự án</h6>
                <div>{{ $totalProject }}</div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Nhân viên</h6>
                <div>{{ $totalUser }}</div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Yêu cầu</h6>
                <div>{{ $totalClient }}</div>
              </div>
              
            </div>
          </div>
        
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Đối tác</h6>
                <div>{{ $totalContractor }}</div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Báo cáo</h6>
                <div>{{ $totalReport }}</div>
              </div>
              
            </div>
          </div>
        
        </div>
        
      </div>
    </div>
  </div> <!-- row -->
    <div class="row ">
      <div class="col-lg-7 col-xl-8 stretch-card ms-1 row">
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
                    <th class="pt-0">Tiến độ</th>
                    <th class="pt-0">Giám sát</th>
                    <th></th>
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
                      <td>{{ $project->progress }} %</td>
                      <td>{{ $project->user->name }}</td>
                      <td><div class="">
                        <a  class="" href="{{ route('view.task',$project->id) }}">
                            <i class="fa-solid fa-eye text-primary"></i>
                        </a>
                        
                    </div></td>
                    </tr>
                    @endif
                  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> 
        </div>
        <div class="card mt-4">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Công việc chú ý</h6>
              
            </div>
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                    <th>Mã dự án</th>
                    <th class="pt-0">Mã Công Việc</th>
                    <th class="pt-0">Tên Công việc</th>
                    <th class="pt-0">Ngày bắt đầu</th>
                    <th class="pt-0">Hoàn thành</th>
                    <th class="pt-0">Tiến độ</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tasks as $task)
                    @if($task->star==1)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $task->projects->projectCode }}</td>
                      <td>{{ $task->task_code }}</td>
                      <td>{{ $task->task_code }}</td>
                      <td>{{ $task->startDate }}</td>
                      <td>{{ $task->endDate }}</td>
                      <td>{{ $task->progress }} %</td>
                      <td><div class="">
                        <a  class="" href="{{ route('view.task',$task->projects->id) }}">
                            <i class="fa-solid fa-eye text-primary"></i>
                        </a>
                        
                    </div></td>
                    </tr>
                    @endif
                  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> 
        </div>
      </div>
      
      <div class="col-lg-5 col-xl-4 stretch-card ms-1">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Yêu cầu tư vấn</h6>
              
            </div>
            <div class="d-flex flex-column">
                
                @foreach($requestClient as $client)
                  <div class="w-100 mt-2">
                    <div class="d-flex justify-content-between">
                      <h6 class="text-body mb-1">{{ $client->name }} - {{ $client->email }}</h6>
                      <p class="text-muted tx-12"><em>{{ $client->created_at->diffForHumans() }}</em></p>
                    </div>
                    <p class="text-muted tx-13">{{ $client->description }}</p>
                  </div>


                @endforeach
              
              
              
            </div>
          </div>
        </div>
      </div>
    </div> <!-- row -->
    
</div>


@endsection