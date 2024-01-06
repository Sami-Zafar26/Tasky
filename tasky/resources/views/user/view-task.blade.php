@extends('layouts.app')

@section('content')
@push('title')
<title>Tasky | Task view</title>
@endpush
@push('page-name')
View Task
@endpush
<div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
  {{-- @push('bootstrap')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  @endpush --}}
  @if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('error')}}
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
            {{-- <div class="form-group"> --}}
                <input type="file" name="task_image" id="task_image">
              {{-- <div class="custom-file"> --}}
                {{-- <label for="task_image" class="custom-file-label">Choose Image</label> --}}
              {{-- </div> --}}
              <span class="text-danger">
                @error('task_image')
                {{$message}}
                @enderror
              </span>
            {{-- </div> --}}
            <input type="hidden" name="task_id" value="{{$task->id}}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="jumbotron bg-white">
      <h1 class="display-4">{{$task->task_title}}</h1>
      <div class="instructions p-3 rounded" style="background-color: gainsboro;">
        <p>{!!$task->task_description!!}</p>
        <p class="d-inline">Task Link: </p><a href="{{$task->task_link}}"  class="" id="prevent">{{$task->task_link}}</a>
        <button class="btn btn-sm btn-dark" id="btn-copy">Copy</button>
        <span id="copied"></span>
      </div>
      @if ($task->task_amount>=100.00)
      <p class="lead d-inline"><span class=""><b>Amount:</b> </span><b>$</b> {{$task->task_amount}}</p>
      @else
      <p class="lead d-inline"><span class=""><b>Amount:</b> </span><b>&#162;</b> {{$task->task_amount}}</p>
      @endif
      <p class="lead"><b>Assigned at: </b> {{$task->created_at}}</p>
      <hr class="my-4">
      <p>
        <li class="text-danger list-unstyled">Warning:</li>
      <ul>
        <li>Users must complete tasks honestly and ethically, avoiding any fraudulent or deceptive practices that could
          compromise the integrity of the platform.</li>
        <li>Users should not engage in any form of scamming or attempt to manipulate the system to gain unfair
          advantages, ensuring a fair and trustworthy environment for all participants.</li>
      </ul>
      </p>
      <hr>
      <button id="done-btn" class="btn btn-success float-right" role="button">Done</button>

    </div>
  </div>
</div>
@push('view-task')
<script src="{{asset('js/view-task.js')}}"></script>
@endpush
@push('copy')
  <script>
    $(document).ready(function(){
      $('#prevent').click(function (e) {
        e.preventDefault();
      });
      $('#btn-copy').click(function () {
        var link = $('#prevent').attr('href'); 

        var tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(link).select();

        // Copy the selected link to the clipboard
        document.execCommand('copy');

        // Remove the temporary input element
        tempInput.remove();
        $('#copied').text('Text copied to clipboard!');
        $('#copied').animate({"opacity":"0.5"});
        $('#copied').animate({"opacity":"0"});

          // $('#task_link').select();
          // document.execCommand('copy');
      });
    });

  </script>
@endpush
@endsection