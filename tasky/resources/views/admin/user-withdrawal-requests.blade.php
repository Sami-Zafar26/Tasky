@extends('admin.layouts.app')
@section('admin-content')
  @push('title')
  <title>Tasky | User withdrawals</title>
@endpush
@push('page-name')
  User withdrawals
@endpush
 <div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">


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

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">User withdrawals</h4>
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
                                Account Name
                            </th>
                            <th>
                                Bank Name
                            </th>
                            <th>
                                Account Number
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($withdrawal_records as $withdrawal_record)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$withdrawal_record->name}}</a></td>
                            <td>{{$withdrawal_record->account_name}}</a></td>
                            <td>{{$withdrawal_record->bank_name}}</td>
                            <td>{{$withdrawal_record->account_number}}</td>
                            @if ($withdrawal_record->withdrawal_amount>=100.00)
                            <td>$ {{$withdrawal_record->withdrawal_amount}}</td>
                                @else
                            <td>&#162; {{$withdrawal_record->withdrawal_amount}}</td>
                            @endif
                            @if ($withdrawal_record->status==1)
                            <td>
                                <span class="badge badge-success">Received</span>
                            </td>
                            @elseif ($withdrawal_record->issue==1)
                            <td>
                                <span class="badge badge-danger">Rejected</span>
                            </td>
                            @else
                            <td>
                                <span class="badge badge-warning">Pending</span>
                            </td>
                            @endif
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
@endpush
@endsection