@extends('layouts.app')
@section('content')
<div class="content" style="padding: 0 30px 30px; min-height: calc(100vh - px); margin-top: 93px">
<div class="error-message">
        <h2 class="error-head">404</h2>
        <h3 class="error-subhead">Page Not Found</h3>
    </div>
</div>
@push('style')
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />    
@endpush
@endsection