@extends('layouts.app')

@section('content')
@push('title')
  <title>Tasky | Home</title>
@endpush
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
    @foreach ($tasks as $task )
        <div class="card my-3">
  <div class="card-header">
    Task
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$task->task_title}}</h5>
    <p class="card-text">{!!substr($task->task_description,0,40)!!}...</p><br>
    <p>Amount: <b>&#162;</b> {{$task->task_amount}}</p><br>
    <a href="{{Route('view',['id'=>$task->token])}}" class="view-task btn btn-info" id="{{$task->id}}">View</a>
  </div>
</div>

</div>
@push('view-task')
 <script src="{{asset('js/view-task.js')}}"></script>
@endpush
@endsection
