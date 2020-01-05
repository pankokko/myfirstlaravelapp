@extends("layouts/default")
@include("components/header")
@section("content")
<div class="upload-wrapper">
    <h2 class="upload-wrapper-title">
      {{$album->albumtitle}}
    </h2>
      <label class="upload-wrapper-form-content-album" for="file_input">
        アルバムに写真を追加
      <input id="file_input" type="file" class="image-input" name="thumbnail">
      </label>
    </div>       
@endsection