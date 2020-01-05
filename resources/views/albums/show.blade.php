@extends("layouts/default")
@include("components/header")
@section("content")
<div class="upload-wrapper">
    <h2 class="upload-wrapper-title">
      {{$album->albumtitle}}
    </h2>
      <label id="back-btn" class="upload-wrapper-form-content-album" for="file_input">
      <a  class="upload-wrapper-form-content-album-link" href="/albums/index" >アルバム一覧</a>
      </label>
      <label class="upload-wrapper-form-content-album" for="file_input">
      <a  class="upload-wrapper-form-content-album-link" href="#" > アルバムに写真を追加</a>
      </label>
    </div>       
@endsection