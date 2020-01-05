@extends("layouts/default")
@include("components/header")
@section("content")
<div class="upload-wrapper">
    <h2 class="upload-wrapper-title">
      {{$album->albumtitle}}
    </h2>
      <label id="back-btn" class="upload-wrapper-form-content-album" for="file_input">
        <a class="upload-wrapper-form-content-album-link" href="/albums/index" >アルバム一覧</a>
      </label>
      <label class="upload-wrapper-form-content-album" for="file_input">
        <a class="upload-wrapper-form-content-album-link" href="/albums/{{$album->id}}/add" > アルバムに写真を追加</a>
      </label>
    </div>
      <div class="album-pictures">
        @foreach($albums as $favorit)
          <div class="album-pictures-wrapper"> 
            <a  class="album-pictures-wrapper-link" href="/albums/{{$favorit->id}}/show" >
              <img class="album-pictures-wrapper-link-picture" src="{{asset( '/storage/albumpic/'. $favorit->path )}}"width="350" height="220px">
              <p class="album-pictures-wrapper-link-title">{{$favorit->title}} </p>
            </a>
          </div>
        @endforeach
      </div> 
@endsection