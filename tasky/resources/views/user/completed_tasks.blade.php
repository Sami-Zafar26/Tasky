@extends('layouts.app')
@push('title')
    <title>Task Completed</title>
@endpush
@push('page-name')
    Task Completed
@endpush
@section('content')
<div class="cover" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">

<div class="row">
@if ($data->isEmpty())
<h4 class="text-center text-muted">You have not completed any task.</h4>
@else
@foreach ($data as $user_task_completions )
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div>
                    <h6 class="card-title">{{$user_task_completions->task_title}}</h6>
                      {{-- <i class="nc-icon nc-globe text-warning"></i> --}}
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="text-right">
                      {{-- <p class="card-category">Capacity</p>
                      <p class="card-title">150GB</p><p> --}}
                    @if ($user_task_completions->approved==1)
                        <small class="badge badge-primary">Verified</small>
                    @else
                        <small class="badge badge-secondary">No Verified</small>
                    @endif
                    </div>
                  </div>
                </div>
                <p class="card-text">{!!substr($user_task_completions->task_description,0,40)!!}...</p>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="fa fa-calendar-o"></i>
                  <b>Completed at :</b> {{$user_task_completions->created_at}}
                {{-- <a href="{{Route('view',['id'=>$task->token])}}" class="view-task btn btn-sm btn-info" id="{{$task->id}}">View</a> --}}
                </div>
              </div>
            </div>
          </div>

@endforeach

@endif
</div>
</div>
@endsection