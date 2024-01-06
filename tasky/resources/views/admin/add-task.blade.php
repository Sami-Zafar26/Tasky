@extends('admin.layouts.app')
@push('title')
  <title>Tasky | Add Task</title>
@endpush
@push('page-name')
  Add Task
@endpush
@section('admin-content')
<div class="cover d-flex justify-content-center flex-column" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
@if (session('task-uploaded'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Attention!</strong> {{session('task-uploaded')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
<div class="bg-white rounded p-4">
<form action="{{Route('uploadtask')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="textarea" id="default" cols="30" rows="10" value="" class="tinyMCE"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="amount">Task link:</label>
            <input type="text" class="form-control" id="task_link" name="task_link"  value="" required>
        </div>
        <div class="form-group ml-4 my-3">
            <input class="form-check-input" type="checkbox" name="optional" value="1" id="invalidCheck2">
            <label class="form-check-label" for="invalidCheck2">Task image will be optional.</label>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="" required>
                </div>
            </div>
            {{-- <div class="col-md-2 ">
                <div class="form-group"> --}}
                    <button type="button" id="calculate" class="btn btn-primary mt-2 ml-3">Calculate</button>
                {{-- </div> --}}
            {{-- </div> --}}
            <div class="col-md-4 d-flex align-items-center">
                <div class="form-group">
                    {{-- <p class="mb-0 d-inline">Total Expense: </p> --}}
                    <p id="expense" class="mb-0 d-inline"></p>
                    {{-- <label for="expense">Total Expense:</label> --}}
                    <input type="hidden" class="form-control" id="expensehidden" name="expense" step="0.01" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Upload</button>

    </form>
    </div>
</div>

@push('tinymce')
    <script src="{{asset('tinymce\tinymce.min.js')}}"></script>
    <script src="{{asset('js\tinytext.js')}}"></script>
    <script src="{{asset('js\calculate.js')}}"></script>
@endpush
@endsection