@extends('layouts.app')
  @push('title')
  <title>Tasky | Withdrawal Records</title>
@endpush
@push('page-name')
  Withdrawal Records
@endpush
@section('content')
<div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
  <div class="container-fluid mt-3">
          <div class="row">
        @if ($withdrawal_records->isEmpty())
        <div class="col-md-12">
          <h5 class="text-center text-muted">You have no withdrawal!</h5>
        </div>
        @else
        <div class="col-md-12">
          <h5 class="text-center">Your Withdrawals</h5>
        </div>
        @if (count($withdrawal_records)==1)
        @foreach ($withdrawal_records as $withdrawal_record)
        <input type="hidden" name="" id="count" value="{{$loop->count}}">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
              <div>
              Withdrawal Details
              </div>
              <hr>
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div>
                    <h6 class="card-title d-inline">Bank Name: </h6><span>{{$withdrawal_record->bank_name}}</span>
                    </div>
                  </div>
                </div>
                <p class="card-text d-inline"><span class="font-weight-bold">Account Name:</span> {{$withdrawal_record->account_name}}</p><br>
                <p class="card-text d-inline"><span class="font-weight-bold">Withdrawal Amount:</span> &#162; {{$withdrawal_record->withdrawal_amount}}</p><br>
                @php
                    $withdrawal_date=date('d-m-y | g:i a',strtotime($withdrawal_record->withdrawal_date))
                @endphp
                <p class="card-text d-inline"><span class="font-weight-bold">Account Number:</span> <span class="cardNumber">{{$withdrawal_record->account_number}}</span></p>
                <p class="card-text"><span class="font-weight-bold">Withdrawal Date:</span> {{$withdrawal_date}}</p>
                {{-- @if ($withdrawal_record->status==1)
                    <span class="badge badge-success">Received</span>
                @elseif ($withdrawal_record->issue==1)
                    <span class="badge badge-danger">Issue</span>
                @else
                    <span class="badge badge-warning">Pending</span>
                @endif --}}
                {{-- <p class="card-text d-inline font-weight-bold">Account Name: </p><span>{{$withdrawal_record->account_name}}</span> --}}
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                @if ($withdrawal_record->status==1)
                    <span class="badge badge-success">Received</span>
                @else
                    <span class="badge badge-warning">Pending</span>
                @endif
                @if($withdrawal_record->approve==1)
                  <a href="{{Route('issue')}}" class="btn btn-danger">Resolve</a>
                  <a href="{{Route('')}}" class="btn btn-">Resend Request</a>
                @endif
                {{-- <p class="card-text">Card Number: {{$withdrawal_record->card_number}}</p>
                <p class="card-text"><span class="font-weight-bold">Withdrawal Date:</span> {{$withdrawal_date}}</p> --}}
                </div>
              </div>
            </div>
          </div>
          @endforeach 
        @else
                @foreach ($withdrawal_records as $withdrawal_record)
        <input type="hidden" name="" id="count" value="{{$loop->count}}">
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
              <div>
              Withdrawal Details
              </div>
              <hr>
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div>
                    <h6 class="card-title d-inline">Bank Name: </h6><span>{{$withdrawal_record->bank_name}}</span>
                    </div>
                  </div>
                </div>
                <p class="card-text d-inline"><span class="font-weight-bold">Account Name:</span> {{$withdrawal_record->account_name}}</p><br>
                <p class="card-text d-inline"><span class="font-weight-bold">Withdrawal Amount:</span> &#162; {{$withdrawal_record->withdrawal_amount}}</p><br>
                @php
                    $withdrawal_date=date('d-m-y | g:i a',strtotime($withdrawal_record->withdrawal_date))
                @endphp
                <p class="card-text d-inline"><span class="font-weight-bold">Account Number:</span> <span class="cardNumber">{{$withdrawal_record->account_number}}</span></p>
                <p class="card-text"><span class="font-weight-bold">Withdrawal Date:</span> {{$withdrawal_date}}</p>
                {{-- @if ($withdrawal_record->status==1)
                    <span class="badge badge-success">Received</span>
                @elseif ($withdrawal_record->issue==1)
                    <span class="badge badge-danger">Issue</span>
                @else
                    <span class="badge badge-warning">Pending</span>
                @endif --}}
                {{-- <p class="card-text d-inline font-weight-bold">Account Name: </p><span>{{$withdrawal_record->account_name}}</span> --}}
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                @if ($withdrawal_record->status==1)
                    <span class="badge badge-success">Received</span>
                @elseif ($withdrawal_record->issue==1)
                    <span class="badge badge-danger">Rejected due to task issue</span>
                @else
                    <span class="badge badge-warning">Pending</span>
                @endif
                {{-- @if($withdrawal_record->issue==1)
                  <a href="{{Route('issue')}}" class="btn btn-sm btn-danger">Resolve</a>
                  <a href="{{Route('resend-request',$withdrawal_record->id)}}" class="btn btn-sm btn-info">Resend Request</a>
                @endif --}}
                {{-- <p class="card-text">Card Number: {{$withdrawal_record->card_number}}</p>
                <p class="card-text"><span class="font-weight-bold">Withdrawal Date:</span> {{$withdrawal_date}}</p> --}}
                </div>
              </div>
            </div>
          </div>
          @endforeach 
        @endif

          @endif
          </div>
</div> 
</div>
@if (count($withdrawal_records)>=1)
@push('count')
    <script>
  var count=document.getElementById("count").value;
  for ( j= 0 ; j <count ; j++) {
    array=[];
  var cardNumber= document.getElementsByClassName("cardNumber")[j].innerText;
  for ( i = 0; i <=20; i=i+4) {
    split=cardNumber.substr(i,4);
    array.push(split);
  }
  number=array.join("-");
  cardNumber=document.getElementsByClassName("cardNumber")[j].innerText=number;
  cardNumber.innerText = number;
  }
  </script>
@endpush
  @endif
@endsection