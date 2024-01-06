@extends('admin.layouts.app')
@section('admin-content')
  @push('title')
  <title>Tasky | User</title>
@endpush
@push('page-name')
  User
@endpush
<div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
{{-- @push('bootstrap')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
@endpush --}}

@if (session('rejected'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Attention!</strong> {{session('rejected')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
@if (session('approved'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Attention!</strong> {{session('approved')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
    <span>
        @error('task_image')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Attention!</strong> Image Not Sended {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        @enderror
    </span>

<div class="modal fade" data-backdrop="static" id="taskdone" tabindex="-1" aria-labelledby="editmodallabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodallabel">Task Done Pictures</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('send')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                    <small><b>Note:</b> Send us a Screenshot of Task that you have done.</small>
                    <div class="form-group">
                        <div class="custom-file">
                        <input type="file" name="task_image" id="task_image" value="">
                        <label for="task_image" class="custom-file-label">Choose Image</label>
                        </div>
                        <span class="text-danger">
                            @error('task_image')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    {{-- <input type="hidden" name="task_id" value="{{$task->id}}"> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div class="modal fade" id="review-task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <form action="" method="POST">
                    @csrf --}}
                    <div class="modal-body">
                        <img src="" id="modal_task_image" alt="">
                        {{-- <button type="submit" class="btn btn-primary">Upload</button> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- <button type="submit" class="btn btn-primary">Yes</button> --}}
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>

<div class="container-fluid">
<div class="jumbotron bg-white">
    <div class="row">
        <div class="col-md-2 d-flex justify-content-center align-items-center">
            <img src="{{asset('images/profile-user.png')}}" alt="No Image" class="img-fluid mb-3" style="height: 150px;">
        </div>
        <div class="col-md-6">
            <br>
            <p class="d-inline"><b>User Name:</b> {{$user->name}}</p><br>
            <p class="d-inline"><b>Earn:</b> <b>&#162;</b> {{$user->amount}}</p><br>
            <p class="d-inline"><b>Total Task Completed:</b> {{$total_task_completed}}</p><br>
            <p class="d-inline"><b>Current Task Issue:</b> {{$current_task_issue}}</p><br>
            <p class="d-inline"><b>Total Withdrawal Requests:</b> {{$total_withdrawal_requests}}</p><br>
            @if ($count_withdrawals>=100.00)
            <p class="d-inline"><b>Total Withdrawals Amount:</b> <b>$</b> {{$count_withdrawals}}</p><br>
                @else
            <p class="d-inline"><b>Total Withdrawals Amount:</b> <b>&#162;</b> {{$count_withdrawals}}</p><br>
            @endif
            <p class=""><b>Account created at:</b> {{$user->created_at}}</p>
        </div>
    </div>
  {{-- <p class="lead">{{$user->amount}}</p> --}}
  <!-- <hr class="my-4">
  <p>
  <li class="text-danger list-unstyled">Warning:</li>
  <ul>
  <li>Users must complete tasks honestly and ethically, avoiding any fraudulent or deceptive practices that could compromise the integrity of the platform.</li>
  <li>Users should not engage in any form of scamming or attempt to manipulate the system to gain unfair advantages, ensuring a fair and trustworthy environment for all participants.</li>
  </ul>
  </p> -->
  <hr>
  <a href="{{Route('withdrawal-request',$user->id)}}" class="btn btn-info btn-sm d-inline">Withdrawal records</a>
  <a href="{{Route('review-user-withdrawal',$user->id)}}" class="btn btn-primary btn-sm d-inline">Withdrawal requests</a>
  <!-- <button id="done-btn" class="btn btn-success float-right" role="button">Done</button> -->
</div>
</div>

   <div class="card">
        <div class="card-header">
            <h4 class="card-title">Review Tasks</h4>
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
                                Username
                            </th>
                            <th>
                                Task Title
                            </th>
                            <th>
                                Task Description
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Task Image
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($task->isEmpty())
                        <tr>
                            <td>No Tasks available for Review </td>
                        </tr>
                        @else --}}
                        @foreach ($taskCompletions as $taskCompletion)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            {{-- <td><img src="{{asset('storage/'.$taskCompletion->task_image)}}" alt="" width="100px">
                            </td> --}}
                            {{-- <td>{{$taskCompletion->task_id}}</td> --}}
                            <td><a href="{{Route('find-user',['id'=>$taskCompletion->users_id])}}" class="text-dark">{{$taskCompletion->name}}</a></td>
                            <td>{{$taskCompletion->task_title}}</td>
                            <td>{!!$taskCompletion->task_description!!}</td>
                            <td>&#162; {{$taskCompletion->task_amount}}</td>
                            <td>
                            {{-- <a href="{{Route('view-image')}}" target="_blank"> --}}
                            @if (is_null($taskCompletion->task_image))
                            <p>Optional No image<p>
                                @else
                            <img src="{{asset('storage/'.$taskCompletion->task_image)}}" alt="" width="100px" class="task-image">
                            @endif
                            </td>
                            {{-- <td>{{$taskCompletion->user_id}}</td> --}}
                            <td>
                                <form action="{{ route('rejected') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="task_amount" value="{{$taskCompletion->task_amount}}">
                                    <input type="hidden" name="user_id" value="{{$taskCompletion->id}}">
                                    <input type="hidden" name="check" value="{{$taskCompletion->task_completion_id}}">
                                    <input type="hidden" name="task_id" value="{{$taskCompletion->task_id}}">
                                    <input type="hidden" name="task_completion_id"
                                        value="{{$taskCompletion->task_completion_id}}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger mb-1">Reject</button>
                                </form>
                                <form action="{{ route('approved') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="task_amount" value="{{$taskCompletion->task_amount}}">
                                    <input type="hidden" name="user_id" value="{{$taskCompletion->id}}">
                                    <input type="hidden" name="approved"
                                        value="{{$taskCompletion->task_completion_id}}">
                                    <input type="hidden" name="task_id" value="{{$taskCompletion->task_id}}">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Approve</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        {{-- @endif --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@push('editmodal')
    <script src="{{asset('js/editmodal.js')}}"></script>
@endpush
@endsection