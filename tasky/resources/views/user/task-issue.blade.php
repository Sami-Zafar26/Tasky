@extends('layouts.app')
@section('content')



<div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
  @if (session('task-resolved'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('task-resolved')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if (session('task-optional'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('task-optional')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if (session('task-not-resolve'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('task-not-resolve')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @error('task_image')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @enderror
  <div class="modal fade" data-backdrop="static" id="resolve" tabindex="-1" aria-labelledby="editmodallabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editmodallabel">Task Done Pictures</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{Route('resolve')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div id="task_description"></div>
            <!-- <input type="text" name="" id="task_description" value=""> -->
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
            <input type="hidden" name="id" id="sno" value="">
            {{-- {{$user_task_completions->task_completion_id}} --}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row">

    @if ($issue->isEmpty())
    <div class="offset-3 col-md-6">
      <h4 class="text-center text-muted">No Issue Found</h4>
    </div>
    @else
    @foreach ($issue as $value )
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div>
                <h6 class="card-title">{{$value->task_title}}</h6>
                {{-- <i class="nc-icon nc-globe text-warning"></i> --}}
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="text-right">
                {{-- <p class="card-category">Capacity</p>
                <p class="card-title">150GB</p>
                <p> --}}
                  {{-- @if ($value->issue==1)
                  <small class="badge badge-danger">issue</small>
                  <button type="submit" class="resolve btn btn-sm btn-outline-danger m-0"
                    id="{{$value->task_completion_id}}">Resolve</a>
                    @else
                    <small class="badge badge-success">No issue</small>
                    @endif --}}
              </div>
            </div>
          </div>
          <p class="card-text">{!!substr($value->task_description,0,40)!!}...</p>
          <input type="hidden" name="" id="description" value="{!!$value->task_description!!}">
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-calendar-o"></i>
            <b>Completed at :</b> {{$value->created_at}}
            {{-- <a href="{{Route('view',['id'=>$task->token])}}" class="view-task btn btn-sm btn-info"
              id="{{$task->id}}">View</a> --}}
            <button type="submit" class="resolve float-right btn btn-sm btn-outline-danger m-0"
              id="{{$value->task_completion_id}}">Resolve</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
</div>
@push('editmodal')
<script src="{{asset('js/editmodal.js')}}"></script>
@endpush
@endsection