@extends('admin.layouts.app')
@push('title')
  <title>Tasky | Task Edit</title>
@endpush
@push('page-name')
  Task Edit
@endpush
@section('admin-content')
<div class="cover d-flex justify-content-center" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
<div class="bg-white rounded p-4">
<form action="{{Route('update')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$task->task_title}}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="textarea" id="default" cols="30" rows="10" value="" class="tinyMCE">{{$task->task_description}}</textarea>
        </div>
        <div class="form-group mt-3">
            <label for="amount">Task link:</label>
            <input type="text" class="form-control" id="task_link" name="task_link"  value="{{$task->task_link}}" required>
        </div>
        <div class="form-group ml-4 my-3">
        @if ($task->optional==1)
            <input class="form-check-input" type="checkbox" name="optional" value="1" id="invalidCheck2" checked>
           @else
            <input class="form-check-input" type="checkbox" name="optional" value="1" id="invalidCheck2">
        @endif
            <label class="form-check-label" for="invalidCheck2">Task image will be optional.</label>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="{{$task->task_amount}}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{$task->quantity}}" required>
                </div>
            </div>
            {{-- <div class="col-md-2 d-flex justify-content-center align-items-center"> --}}
                {{-- <div class="form-group"> --}}
                    <button type="button" id="calculate" class="btn btn-info mt-2 ml-3">Calculate</button>
                    <input type="hidden" class="form-control" id="title" name="task_id" value="{{$task->id}}" required>
                {{-- </div> --}}
            {{-- </div> --}}
            <div class="col-md-4 d-flex align-items-center">
                <div class="form-group">
                    {{-- <label for="expense">Total Expense:</label> --}}
                    @if ($task->total_expense>=100.00)
                    <p id="expense" class="mb-0 d-inline">Total Expense: {{$task->total_expense}} <b>$</b></p>
                        @else
                    <p id="expense" class="mb-0 d-inline">Total Expense: {{$task->total_expense}} <b>&#162;</b></p>
                    @endif
                    {{-- <p class="mb-0 d-inline">Total Expense: </p> --}}
                    <input type="hidden" class="form-control" id="expensehidden" name="expense" value="{{$task->total_expense}}" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>
</div>

@push('tinymce')
    <script src="{{asset('tinymce\tinymce.min.js')}}"></script>
    <script src="{{asset('js\tinytext.js')}}"></script>
    <script src="{{asset('js\calculate.js')}}"></script>
@endpush
    {{-- @push('edit-tinymce') --}}
        {{-- <script src="{{asset('js/edit-tinymce.js')}}"></script> --}}
        {{-- <script src="{{asset('tinymce\tinymce.min.js')}}"></script>
        <script src="{{asset('js\calculate.js')}}"></script> --}}
    {{-- @endpush --}}
@endsection