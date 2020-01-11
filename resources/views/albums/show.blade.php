@extends("layouts/default")
@include("components/header")
@section("title")
アルバム詳細ページ
@endsection
@section("content")
<div class="upload-wrapper">
<h1 class="upload-wrapper-albumtitle">{{$album->albumtitle}}</h1>
  <p class="upload-wrapper-title">
    {{$album->description}}
  </p>
  <label id="back-btn" class="upload-wrapper-form-content-album" for="file_input">
    <a class="upload-wrapper-form-content-album-link" href="/albums/index" >アルバム一覧</a>
  </label>
  <label class="upload-wrapper-form-content-album" for="file_input">
    <a class="upload-wrapper-form-content-album-link" href="/albums/{{$album->id}}/add" > アルバムに写真を追加</a>
  </label>
  @if(Auth::id() == $album->user->id)
    <form action="/albums/{{$album->id}}/destroy" method="post" class="album-form">
      @csrf
      {{ method_field('delete')}}
      <i class="fas fa-trash">
        <input id="delete-input" type="submit" value="このアルバムを削除">
      </i>
    </form>
  @endif
    <div class="album-wrapper">
      @foreach($albums as $favorit)
        <div class="album-pictures-wrapper"> 
          <a class="album-pictures-wrapper-link" href="/albums/{{$favorit->id}}/detail">
            <img class="album-pictures-wrapper-link-picture" src="{{asset( '/storage/albumpic/'. $favorit->path )}}"width="325" height="220px">
          </a>
          <p class="album-pictures-wrapper-link-title">{{$favorit->title}} </p>
        </div>
      @endforeach
    </div> 
</div>
     
@endsection