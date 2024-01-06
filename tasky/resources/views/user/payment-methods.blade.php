@extends('layouts.app')
@push('title')
<title>Tasky | Payment-method</title>
@endpush
@push('page-name')
Payment-method
@endpush
@section('content')
<div class="cover" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
  @if (session('payment-method-added'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('payment-method-added')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  @if (session('card_updated'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{session('card_updated')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @error('bank_name')
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @enderror
  @error('account_name')
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @enderror
  @error('account_number')
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attention!</strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @enderror

  <div class="modal fade" data-backdrop="static" id="add-method" tabindex="-1" aria-labelledby="editmodallabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editmodallabel">Add Payment Method</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{Route('add-method')}}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault01">Bank Name</label>
                <input type="text" class="form-control" id="validationDefault01" name="bank_name" required>
                @error('bank_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationDefault02">Account Name</label>
                <input type="text" class="form-control" id="validationDefault02" name="account_name" required>
                @error('account_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault03">Account Number</label>
                <input type="text" class="form-control" id="validationDefault03" name="account_number" maxlength="24"
                  required>
                @error('account_number')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" data-backdrop="static" id="card-edit" tabindex="-1" aria-labelledby="editmodallabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editmodallabel">Edit Payment Method</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{Route('card-update')}}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault01">Bank Name</label>
                <input type="text" class="form-control" id="bank_name" name="bank_name" value="" required>
                @error('bank_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationDefault02">Account Name</label>
                <input type="text" class="form-control" id="account_name" name="account_name" value="" required>
                @error('account_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <input type="hidden" id="id" name="method_id" value="" required>
                <label for="validationDefault03">Card Number</label>
                <input type="text" class="form-control" id="account_number" name="account_number" maxlength="24"
                  value="" required>
                @error('account_number')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- <div class="container-fluid">
    <div class="bg-white p-4 rounded">
      <form action="{{Route('add-method')}}" method="POST">
        @csrf
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationDefault01">Bank Name</label>
            <input type="text" class="form-control" id="validationDefault01" name="bank_name" required>
            @error('bank_name')
            {{$message}}
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationDefault02">Account Name</label>
            <input type="text" class="form-control" id="validationDefault02" name="account_name" required>
            @error('account_title')
            {{$message}}
            @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationDefault03">card Number</label>
            <input type="text" class="form-control" id="validationDefault03" name="card_number" required>
            @error('account_number')
            {{$message}}
            @enderror
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault04">CCV</label>
            <input type="text" class="form-control" name="cvv" id="cvv" maxlength="3">
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault05">Expiration Date</label>
            <input type="date" class="form-control" name="expiration_date" id="">
          </div>
        </div>
        {{-- <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
              Agree to terms and conditions
            </label>
          </div>
        </div> --}}
        {{-- <button class="btn btn-primary" type="submit">Save</button>
      </form>
    </div>
  </div> --}}

  <div class="container-fluid mt-3">
    <div class="row">
      @if ($bank_accounts->isEmpty())
      <div class="col-md-12">
        <button data-target="#add-method" data-toggle="modal"
          style="border-radius: 50%; border: none; background-color: #3498ff; padding: 5px 5px; float: right; height: 45px; width: 45px; display: flex; justify-content: center; align-items: center; outline: none;"><i
            class="nc-icon nc-simple-add" style="font-size: 18px; color: #fff; font-weight: bold;"></i></button>
      </div>
      <div class="col-md-12">
        <h3 class="text-center text-muted">No account added Yet!</h3>
      </div>
      @else
      <div class="col-md-12">
        <button data-target="#add-method" data-toggle="modal"
          style="border-radius: 50%; border: none; background-color: #3498ff; padding: 5px 5px; float: right; height: 45px; width: 45px; display: flex; justify-content: center; align-items: center; outline: none;"><i
            class="nc-icon nc-simple-add" style="font-size: 18px; color: #fff; font-weight: bold;"></i></button>
      </div>
      <div class="col-md-12">
        <h5 class="text-center">Your Bank Accounts</h5>
      </div>
      @if (count($bank_accounts)==1)
      @foreach ($bank_accounts as $bank_account)
      <input type="hidden" name="" id="count" value="{{$loop->count}}">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-body ">
            <div>
              Bank Account Details
            </div>
            <hr>
            <div class="row">
              <div class="col-5 col-md-4">
                {{-- <div>
                  <h6 class="card-title d-inline">Bank Name: </h6><span>{{$bank_account->bank_name}}</span>
                </div> --}}
              </div>
            </div>
            <h6 class="card-title d-inline">Bank Name: </h6><span id="bankname">{{$bank_account->bank_name}}</span><br>
            <p class="card-text d-inline "><span class="font-weight-bold">Account Name:</span> <span
                id="accountname">{{$bank_account->account_name}}</span></p><br>
            <p class="card-text d-inline"><span class="font-weight-bold">Account Number:</span> <span class="cardNumber"
                id="accountnumber">{{$bank_account->account_number}}</span></p>
          </div>
          <div class="card-footer ">
            {{--
            <hr> --}}
            <div class="stats">
              <button href="{{Route('card-edit',$bank_account->id)}}" class="cardEdit btn btn-info btn-sm float-right"
                id="{{$bank_account->id}}">Edit</button>
              {{-- <i class="fa fa-calendar-o"></i> --}}
              {{-- @php
              $time=date("d-m-y | H:i:s a", strtotime($task->tasks_created_at))
              @endphp --}}
              {{-- <p class="card-text">Account Number: {{$bank_account->card_number}}</p> --}}
              {{-- <b>Assigned at</b> {{$task->tasks_created_at}} --}}
              {{-- <b>Assigned at: </b> {{ $time}} --}}
              {{-- <a href="{{Route('view',['id'=>$task->token])}}" class="view-task btn btn-sm btn-info float-right"
                id="{{$task->id}}">View</a> --}}
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @else
      @foreach ($bank_accounts as $bank_account)
      <input type="hidden" name="" id="count" value="{{$loop->count}}">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-body ">
            <div>
              Bank Account Details
            </div>
            <hr>
            <div class="row">
              <div class="col-5 col-md-4">
                {{-- <div>
                  <h6 class="card-title d-inline">Bank Name: </h6><span>{{$bank_account->bank_name}}</span>
                </div> --}}
              </div>
            </div>
            <h6 class="card-title d-inline">Bank Name: </h6><span id="bankname">{{$bank_account->bank_name}}</span><br>
            <p class="card-text d-inline "><span class="font-weight-bold">Account Name:</span> <span
                id="accountname">{{$bank_account->account_name}}</span></p><br>
            <p class="card-text d-inline"><span class="font-weight-bold">Account Number:</span> <span class="cardNumber"
                id="accountnumber">{{$bank_account->account_number}}</span></p><br>
          </div>
          <div class="card-footer ">
            {{--
            <hr> --}}
            <div class="stats">
              <button href="{{Route('card-edit',$bank_account->id)}}" class="cardEdit btn btn-info btn-sm float-right"
                id="{{$bank_account->id}}">Edit</button>
              {{-- <i class="fa fa-calendar-o"></i> --}}
              {{-- @php
              $time=date("d-m-y | H:i:s a", strtotime($task->tasks_created_at))
              @endphp --}}
              {{-- <p class="card-text">Account Number: {{$bank_account->card_number}}</p> --}}
              {{-- <b>Assigned at</b> {{$task->tasks_created_at}} --}}
              {{-- <b>Assigned at: </b> {{ $time}} --}}
              {{-- <a href="{{Route('view',['id'=>$task->token])}}" class="view-task btn btn-sm btn-info float-right"
                id="{{$task->id}}">View</a> --}}
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
@if (count($bank_accounts)>=1)
@push('count')
<script>
  var count = document.getElementById("count").value;
  for (j = 0; j < count; j++) {
    array = [];
    var cardNumber = document.getElementsByClassName("cardNumber")[j].innerText;
    for (i = 0; i <= 20; i = i + 4) {
      split = cardNumber.substr(i, 4);
      array.push(split);
    }
    number = array.join("-");
    cardNumber = document.getElementsByClassName("cardNumber")[j].innerText = number;
    cardNumber.innerText = number;
  }
</script>
@endpush
@endif
@push('view-task')
<script src="{{asset('js/view-task.js')}}"></script>
@endpush
@endsection