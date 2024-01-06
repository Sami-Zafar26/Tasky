@extends('admin.layouts.app')
@push('title')
<title>Tasky | Users</title>
@endpush
@push('page-name')
Tasky Users
@endpush
@section('admin-content')
<div class="cover" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
  @if (session('user-unbanned'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('user-unbanned')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if (session('user-banned'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('user-banned')}}
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
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">All Users</h4>
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
                Amount/Expense
              </th>
              <th>
                Role
              </th>
              <th>
                Restriction
              </th>
              {{-- <th class="text-center">
                Action
              </th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($tasky_users as $user )
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td><a href="{{Route('find-user',['id'=>$user->id])}}" class="text-dark">{{$user->name}}</a></td>
              <td>&#162; {{$user->amount}}</td>
              <td class="">
                @if ($user->is_admin==1)
                <a href="{{Route('role-admin',['id'=>$user->id])}}" class="play btn btn-sm btn-success mr-1"
                  id="{{$user->id}}">admin</a>
                @else
                <a href="{{Route('role-user',['id'=>$user->id])}}" class="pause btn btn-sm btn-warning mr-1"
                  id="{{$user->id}}">User</a>
                @endif
              </td>
              <td class="">
                @if ($user->restriction==1)
                <a href="{{Route('restriction-unbann',['id'=>$user->id])}}" class="play btn btn-sm btn-secondary mr-1"
                  id="{{$user->id}}">Unbann</a>
                @else
                <a href="{{Route('restriction-bann',['id'=>$user->id])}}" class="pause btn btn-sm btn-danger mr-1"
                  id="{{$user->id}}">Bann</a>
                @endif
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