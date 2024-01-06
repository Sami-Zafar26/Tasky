@extends('admin.layouts.app')
@push('title')
<title>Tasky | Queries</title>
@endpush
@push('page-name')
Review Queries
@endpush
@section('admin-content')
<div class="cover" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">

    {{-- @if (session('aproved'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Attention!</strong> {{session('approved')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('rejected'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Attention!</strong> {{session('rejected')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}

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
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Review Queries</h4>
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
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Subject
                            </th>
                            <th>
                                Message
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($task->isEmpty())
                        <tr>
                            <td>No Tasks available for Review </td>
                        </tr>
                        @else --}}
                        @foreach ($queries as $query)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            {{-- <td><img src="{{asset('storage/'.$taskCompletion->task_image)}}" alt="" width="100px">
                            </td> --}}
                            {{-- <td>{{$taskCompletion->task_id}}</td> --}}
                            <td>{{$query->name}}</a></td>
                            <td>{{$query->email}}</td>
                            <td>{{$query->subject}}</td>
                            <td>{{$query->message}}</td>
                            {{-- <td>
                                <form action="{{ route('rejected') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="task_amount" value="{{$taskCompletion->task_amount}}">
                                    <input type="hidden" name="user_id" value="{{$taskCompletion->users_id}}">
                                    <input type="hidden" name="check" value="{{$taskCompletion->task_completion_id}}">
                                    <input type="hidden" name="task_id" value="{{$taskCompletion->task_id}}">
                                    <input type="hidden" name="task_completion_id"
                                        value="{{$taskCompletion->task_completion_id}}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger mb-1">Reject</button>
                                </form>
                                <form action="{{ route('approved') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="task_amount" value="{{$taskCompletion->task_amount}}">
                                    <input type="hidden" name="user_id" value="{{$taskCompletion->users_id}}">
                                    <input type="hidden" name="approved"
                                        value="{{$taskCompletion->task_completion_id}}">
                                    <input type="hidden" name="task_id" value="{{$taskCompletion->task_id}}">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Approve</button>
                                </form>
                            </td> --}}
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
{{-- <script src="{{asset('tinymce\tinymce.min.js')}}"></script> --}}
{{-- <script src="{{asset('js\tinytext.js')}}"></script> --}}
{{-- <script src="{{asset('js\calculate.js')}}"></script> --}}
@endpush
@endsection