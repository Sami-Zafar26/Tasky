@extends('layouts.app')
@section('content')
@push('page-name')
  Tasks
@endpush
<div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
<div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
            <a href="{{Route('all-tasks')}}">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-paper text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      {{-- <p class="card-category">Tasks</p> --}}
                      <p class="card-title">Tasks</p><p>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
            <a href="{{Route('myearnings')}}">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      {{-- <p class="card-category">My Earnings</p> --}}
                      <p class="card-title">My Earnings</p>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i>
                  Last day
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
            <a href="{{Route('issue')}}">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      {{-- <p class="card-category">issues</p> --}}
                      <p class="card-title">Issues</p>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i>
                  In the last hour
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
            <a href="{{Route('completed-tasks')}}">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-check-2 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      {{-- <p class="card-category">Completed Tasks</p> --}}
                      <p class="card-title">Completed Tasks</p>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
            <a href="{{Route('payment')}}">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-single-copy-04 text-info"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      {{-- <p class="card-category">Completed Tasks</p> --}}
                      <p class="card-title">Payment-methods</p>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
            <a href="{{Route('withdrawal_records')}}">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-single-copy-04 text-info"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      {{-- <p class="card-category">Completed Tasks</p> --}}
                      <p class="card-title">Withdrawal Records</p>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update now
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
@endsection
