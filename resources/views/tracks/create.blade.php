@extends('layout')

@section('title', 'Add a Track')

@section('main')
  <div class="row">
    <div class="col">
      <form action="/tracks" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Track Name</label>
          <input type="text" id="name" name="name" class="form-control"value="{{old('name')}}" >
          <small class="text-danger">{{$errors->first('name')}} </small>
        </div>


        <div class="form-group">
            <label for="album">Album</label>
            <select id="albums" name="album" class="form-control">
              @foreach($albums as $album)
              <!-- first variable is from the controller that we defined. the second one is a new name -->
              <option value="{{$album->AlbumId}}" {{$album->AlbumId == old('album') ? "selected" : "" }}>
                <!-- {{$album->AlbumId == '2822' ? "selected" : ""}} -->
                {{$album->Title}}
              </option>
              @endforeach
            </select>
            <small class="text-danger">{{$errors->first('album')}} </small>
          </div>


          <div class="form-group">
              <label for="media">Media Type</label>
              <select id="media" name="media" class="form-control">
                @foreach($media_types as $media)
                <!-- <option value="{{$media->MediaTypeId}}"> -->
                  <option value="{{$media->MediaTypeId}}" {{$media->MediaTypeId == old('media') ? "selected" : "" }}>
                    <!-- <option value="{{$media->MediaTypeId}}" {{$media->MediaTypeId == ('media')}}' ? "selected" : ""}}> -->
                  {{$media->Name}}</option>
                @endforeach
              </select>
              <small class="text-danger">{{$errors->first('media')}} </small>
            </div>

            <div class="form-group">
                <label for="genres">Genre</label>
                <select id="genres" name="genres" class="form-control">
                @foreach($genres as $genre)
                <!-- <option value="{{$genre->GenreId}}"> -->
                  <option value="{{$genre->GenreId}}" {{$genre->GenreId == old('genres') ? "selected" : "" }}>
                    <!-- <option value="{{$genre->GenreId}}" {{$genre->GenreId == ('genres')}}' ? "selected" : ""}}> -->
                  {{$genre->Name}}</option>
                @endforeach
                </select>
                <small class="text-danger">{{$errors->first('genres')}} </small>
              </div>

        <div class="form-group">
          <label for="composer">Composer</label>
          <input type="text" id="composer" name="composer" class="form-control" >
          <small class="text-danger">{{$errors->first('composer')}} </small>
        </div>

        <div class="form-group">
          <label for="milliseconds">Track Length</label>
          <input type="number" id="milliseconds" name="milliseconds" class="form-control">
          <small class="text-danger">{{$errors->first('milliseconds')}} </small>
        </div>

        <div class="form-group">
          <label for="bytes">File Size</label>
          <input type="number" id="bytes" name="bytes" class="form-control">
          <small class="text-danger">{{$errors->first('bytes')}} </small>
        </div>

        <div class="form-group">
          <label for="price">Track Price</label>
          <input type="number" id="price" name="price" class="form-control" >
          <small class="text-danger">{{$errors->first('price')}} </small>
        </div>

        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </form>
    </div>
  </div>
@endsection
