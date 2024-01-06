@extends('admin.layouts.app')
@push('title')
<title>Tasky | Expenses</title>
@endpush

@push('page-name')
Expenses
@endpush
@section('admin-content')
<div class="cover" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">

  <div class="row">
{{-- 
    <div class="card border-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header">Expenses</div>
      <div class="card-body text-secondary">
        <h5 class="card-title">Admin Name: {{$admin->name}}</h5>
        <p class="card-text">Total Task Created: {{$taskcreated}}
        <p>
        <p class="card-text">Total Expense: <b>&#162;</b> {{$admin->amount}}
        <p>
      </div>
    </div> --}}

    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-money-coins text-success"></i>
                </div>
                <h5 class="card-title text-dark">Admin Name: {{$admin->name}}</h5>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Expense</p>
                  @if ($admin->amount>=100.00)
                  @php
                    $amount=number_format($admin->amount,2)
                  @endphp
                  <p class="card-title text-info"><b>$</b> {{$amount}}</p>
                  @else
                  <p class="card-title text-info"><b>&#162;</b> {{$admin->amount}}</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        <div class="card-footer ">
          <hr>
          {{-- <div class="stats">
            <i class="fa fa-calendar-o"></i>
            Last day
          </div> --}}
          <p class="card-text">Total Task Created: {{$taskcreated}}</p>
        </div>
      </div>
    </div>
    <div>
    </div>
    @endsection