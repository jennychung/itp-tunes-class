@extends('layout')

@section('title', 'Settings')

@section('main')
<h1> Change Maintenance Mode  </h1>
  <form method="post">
    @csrf
<div class="form-check">
  <input
  {{ $value == 'on' ? 'checked' : ''}}
  class="form-check-input" type="checkbox" name="maintenance" value="{{$value}}" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Maintenance Mode
  </label>
<div>
  <br>
    <input type="submit" value="Submit" class="btn btn-primary">
  </div>
</div>
</form>

<!-- {{$value}} -->

@endsection
