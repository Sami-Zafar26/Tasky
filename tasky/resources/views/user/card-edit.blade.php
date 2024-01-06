@extends('layouts.app')
   @push('title')
<title>Tasky | Edit Card</title>
@endpush
@push('page-name')
 Edit Card
@endpush
@section('admin-content')
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

{{-- <div class="modal fade" data-backdrop="static" id="add-method" tabindex="-1" aria-labelledby="editmodallabel"
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
      <label for="validationDefault03">Card Number</label>
      <input type="text" class="form-control" id="validationDefault03" name="card_number" maxlength="16" required>
        @error('account_number')
          {{$message}}
        @enderror
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">CVV</label>
      <input type="text" class="form-control" name="cvv" maxlength="3" id="cvv">
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Expiration Date</label>
      <input type="date" class="form-control" name="expiration_date" id="">
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
</div> --}}

{{-- <div class="modal fade" data-backdrop="static" id="add-method" tabindex="-1" aria-labelledby="editmodallabel"
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
      <input type="text" class="form-control" id="validationDefault01" name="bank_name" value="{{}}" required>
      @error('bank_name')
          {{$message}}
      @enderror
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Account Name</label>
      <input type="text" class="form-control" id="validationDefault02" name="account_name" value="{{}}" required>
        @error('account_title')
          {{$message}}
        @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Card Number</label>
      <input type="text" class="form-control" id="validationDefault03" name="card_number" maxlength="16" value="{{}}" required>
        @error('account_number')
          {{$message}}
        @enderror
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">CVV</label>
      <input type="text" class="form-control" name="cvv" maxlength="3" value="{{}}" id="cvv">
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Expiration Date</label>
      <input type="date" class="form-control" name="expiration_date" id="" value="{{}}">
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
</div> --}}

<div class="container-fluid">
<div class="bg-white p-4 rounded">
   <form action="{{Route('card-update')}}" method="POST">
   @csrf
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">Bank Name</label>
      <input type="text" class="form-control" id="validationDefault01" name="bank_name" value="{{$payment_method->bank_name}}" required>
      @error('bank_name')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Account Name</label>
      <input type="text" class="form-control" id="validationDefault02" name="account_name" value="{{$payment_method->account_name}}" required>
        @error('account_title')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">card Number</label>
      <input type="text" class="form-control" id="validationDefault03" name="card_number" value="{{$payment_method->card_number}}" required>
        @error('card_number')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">CCV</label>
      <input type="text" class="form-control" name="cvv" id="cvv" maxlength="3" value="{{$payment_method->cvv}}">
              @error('cvv')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Expiration Date</label>
      <input type="date" class="form-control" name="expiration_date" id="" value="{{$payment_method->expiration_date}}">
              @error('expiration_date')
          <span class="text-danger">{{$message}}</span>
        @enderror
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
  <button class="btn btn-primary" type="submit">Update</button>
</form>
</div>
</div>

          </div>
</div> 

</div>
@endsection