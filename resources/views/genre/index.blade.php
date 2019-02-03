@extends('layout')

@section('title', 'Edit Genre Name')

@section('main')
  <div class="row">
    <div class="col">
      <form action="/genres" method="post">
        @csrf
        <!-- you need this to prevent web forgery attacks. adds hidden input with token value. -->
        <div class="form-group">
          <label for="name">
            Edit Genre Name:
            {{$genres->Name}}<br>
            <!-- {{$genres->GenreId}} -->
          </label>
          <input type="hidden" name="genreId" id="genreId" value="{{$genres->GenreId}}">
          <input type="text" placeholder="{{$genres->Name}}" id="name" name="name" class="form-control" value="{{old('name')}}">
          <small class="text-danger">{{$errors->first('name')}} </small>
          <!-- give me first name of the error. only getting the first error if exists -->

        </div>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </form>
    </div>
  </div>
@endsection
