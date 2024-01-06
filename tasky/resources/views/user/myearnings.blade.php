@extends('layouts.app')
@push('title')
  <title>Tasky | My Earnings</title>
@endpush
@push('page-name')
  Tasks
@endpush
@section('content')
<div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
@if (session('withdrawal'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Attention!</strong> {{session('withdrawal')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if (session('withdrawal_error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Attention!</strong> {{session('withdrawal_error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@error('withdrawal_amount')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Attention!</strong> {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@enderror


<div class="modal fade" data-backdrop="static" id="withdrawal" tabindex="-1" aria-labelledby="editmodallabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodallabel">Withdrawal Cash</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('withdrawal')}}" method="POST">
              @csrf
                <div class="modal-body">
                {{-- <div class="form-group">
                <label>Withdrawal Range:</label>
                <input type="range" name="" id="" class="custom-range">
                </div> --}}
                <div class="form-group">
                <label>Withdrawal Cash:</label>
                <input type="number" class="form-control" name="withdrawal_amount" id="" min="0.01" step="0.01" max="{{$earning->amount}}">
                </div>
                  <label for="validationCustom04">Choose Method:</label>
                  <select class="custom-select" id="validationCustom04" name="payment_method_id" required>
                    <option selected disabled value="">Choose payment Method</option>
                    @foreach ( $bank_accounts as $bank_account )
                    <option value="{{$bank_account->id}}">{{$bank_account->bank_name}}</option>
                    @endforeach
                  </select>
                    {{-- <input type="hidden" name="task_id" value="{{$task->id}}"> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Withdrawal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@error('withdrawal_cash')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Attention!</strong> You can not withdrawak your earning {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@enderror

<div class="card border-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Earnings</div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Name: {{$earning->name}}</h5>
    <p class="card-text">Total Task Completed: {{$task_count}}<p>
    @if ($earning->amount>=100.00)
    <p class="card-text">Total Earn: <b>$</b> {{$earning->amount}}<p>
        @else
    <p class="card-text">Total Earn: <b>&#162;</b> {{$earning->amount}}<p>
    @endif
    {{-- {{$issue->issue}} --}}
    @if (isset($issue->issue)==1)
    <p class="text-danger">You are Banned You can not withdrawal your Earnings first you have to resolve this issue</p>
    <a href="{{Route('issue')}}" class="btn btn-sm btn-danger">Resolve</a>
    @elseif ($earning->amount==0.00)
    <button data-target="#withdrawal" data-toggle="modal" class="btn btn-sm btn-success" id="withdrawal-button" disabled>Withdrawal</button>
    @else
    <button data-target="#withdrawal" data-toggle="modal" class="btn btn-sm btn-success" id="withdrawal-button">Withdrawal</button>
    @endif
  </div>
</div>
</div>
@endsection