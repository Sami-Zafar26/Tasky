@extends('admin.layouts.app')
@push('title')
<title>Tasky | Tasks</title>
@endpush
@push('page-name')
Tasks
@endpush
@section('admin-content')
<div class="cover" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
  @if (session('resume'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('resume')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if (session('pause'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('pause')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if (session('updated'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('updated')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if (session('deleted'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('deleted')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{Route('delete')}}" method="POST">
          @csrf
          <div class="modal-body">
            <input type="hidden" class="form-control" id="sno" name="sno" required>
            <h3>Are you sure to delete this task?</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Sr.#</th>
        <th scope="col">Task Title</th>
        <th scope="col">Task Description</th>
        <th scope="col">Amount</th>
        <th scope="col">Task Completed</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total Expense</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$task->task_title}}</td>
        <td>{!!$task->task_description!!}</td>
        <td>&#162; {{$task->task_amount}}</td>
        <td>{{$task->task_completed}}</td>
        <td>{{$task->quantity}}</td>
        <td>&#162; {{$task->total_expense}}</td>
        <td><a href="{{route('edit',[$task->id])}}" class="edit btn btn-info mr-1"
            id="{{$task->id}}">Edit</a></button><button class="delete btn btn-danger" id="{{$task->id}}">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table> --}}
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">All Tasks</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="myTable">
          <thead class=" text-primary">
            <tr>
              <th>
                Sr.#
              </th>
              <th>
                Task Title
              </th>
              <th>
                Task Description
              </th>
              <th>
                Task Link
              </th>
              <th class="text-center">
                Image Optional
              </th>
              <th>
                Amount
              </th>
              <th>
                Quantity Completed
              </th>
              <th>
                Total Quantity
              </th>
              <th>
                Total Expense
              </th>
              <th class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tasks as $task )
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td><a href="{{Route('find-task-completion',['id'=>$task->id])}}"
                  class="text-dark">{{$task->task_title}}</a></td>
              <td>{!!$task->task_description!!}</td>
              <td>{{$task->task_link}}</td>
              @if ($task->optional==1)
              <td class="text-center">Yes</td>
                @else
              <td class="text-center">No</td>
              @endif
              @if ($task->task_amount>=100.00)
              <td><b>$</b> {{$task->task_amount}}</td>
              @else
              <td><b>&#162;</b> {{$task->task_amount}}</td>
              @endif
              <td class="text-center">{{$task->taskscompletion_count}}</td>
              <td>{{$task->quantity}}</td>
              @if ($task->total_expense>=100.00)
              <td><b>$</b> {{$task->total_expense}}</td>
              @else
              <td><b>&#162;</b> {{$task->total_expense}}</td>
              @endif
              {{-- <td><a href="{{Route('edit',['id'=>$task->id])}}"><button
                    class="btn btn-info">Edit</button></a><a><button class="btn btn-danger">Delete</a></button></td>
              --}}
              <td class="text-center">
                @if ($task->control==1)
                <a href="{{Route('resume',['id'=>$task->id])}}" class="play btn btn-sm btn-primary mr-1"
                  id="{{$task->id}}">Resume</a>
                @elseif ($task->completed==1)
                <span class="badge badge-success mr-1">Completed</span>
                @else
                <a href="{{Route('pause',['id'=>$task->id])}}" class="pause btn btn-sm btn-secondary mr-1"
                  id="{{$task->id}}">Pause</a>
                @endif
                <a href="{{route('edit',[$task->id])}}" class="edit btn btn-sm btn-info mr-1"
                  id="{{$task->id}}">Edit</a>
                <button class="delete btn btn-sm btn-danger" id="{{$task->id}}">Delete</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@push('editmodal')
<script src="{{asset('js/editmodal.js')}}"></script>
<script src="{{asset('tinymce\tinymce.min.js')}}"></script>
<script src="{{asset('js\tinytext.js')}}"></script>
@endpush
@endsection