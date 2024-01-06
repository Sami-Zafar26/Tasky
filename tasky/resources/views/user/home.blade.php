@extends('layouts.app')
@section('content')
@push('title')
  <title>Tasky | Tasks</title>
@endpush
@push('page-name')
 All Tasks
@endpush
{{-- <div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
    <div class="row">
        <div class="col-md-12">

            <div class="container-fluid">
                @if (session('task-sended'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{session('task-sended')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('task-completed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{session('task-completed')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($tasks->isEmpty())
                    <h3 class="text-center text-muted">No more task available!</h3>
                @else
                    @foreach ($tasks as $task)
                        <div class="card my-3">
                            <div class="card-header">
                                Task
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$task->task_title}}</h5>
                                <p class="card-text">{!!substr($task->task_description,0,40)!!}...</p><br>
                                
                                <a href="{{Route('view',['id'=>$task->token])}}" class="view-task btn btn-info" id="{{$task->id}}">View</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div> --}}

                <div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
                    @if (session('task-sended'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{session('task-sended')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('task-completed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{session('task-completed')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('task-image-optional'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Attention!</strong> {{session('task-image-optional')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
        <div class="row">
        @if ($tasks->isEmpty())
        <div class="offset-md-3 col-md-6">
          <h3 class="text-center text-muted">No more task available!</h3>
        </div>
        @else
        @if (count($tasks)==1)
                @foreach ($tasks as $task)
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div>
                    <h6 class="card-title">{{$task->task_title}}</h6>
                      {{-- <i class="nc-icon nc-globe text-warning"></i> --}}
                    </div>
                  </div>
                  {{-- <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Capacity</p>
                      <p class="card-title">150GB</p><p>
                    </p></div>
                  </div> --}}
                </div>
                {!!substr($task->task_description,0,25)!!}...
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="fa fa-calendar-o"></i>
                @php
                  $time=date("d-m-y | H:i:s a", strtotime($task->tasks_created_at))
                @endphp
                 {{-- <b>Assigned at</b> {{$task->tasks_created_at}} --}}
                 <b>Assigned at: </b> {{ $time}}
                <a href="{{Route('view',['id'=>$task->token])}}" class="view-task btn btn-sm btn-info float-right" id="{{$task->id}}">View</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach 
        @else
        @foreach ($tasks as $task)
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div>
                    <h6 class="card-title">{{$task->task_title}}</h6>
                      {{-- <i class="nc-icon nc-globe text-warning"></i> --}}
                    </div>
                  </div>
                  {{-- <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Capacity</p>
                      <p class="card-title">150GB</p><p>
                    </p></div>
                  </div> --}}
                </div>
                {!!substr($task->task_description,0,25)!!}...
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="fa fa-calendar-o"></i>
                @php
                  $time=date("d-m-y | H:i:s a", strtotime($task->tasks_created_at))
                @endphp
                 {{-- <b>Assigned at</b> {{$task->tasks_created_at}} --}}
                 <b>Assigned at: </b> {{ $time}}
                <a href="{{Route('view',['id'=>$task->token])}}" class="view-task btn btn-sm btn-info float-right" id="{{$task->id}}">View</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach 
          @endif

        {{-- <div class="pagination">
          {{$tasks->links()}}
        </div> --}}
        </div>
        @endif
        @endsection