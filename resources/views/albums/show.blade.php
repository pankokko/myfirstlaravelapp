@extends("layouts/default")
@include("components/header")
@section("content")
<div class="upload-wrapper">
  <p class="upload-wrapper-title">
    {{$album->description}}
  </p>
  <label id="back-btn" class="upload-wrapper-form-content-album" for="file_input">
    <a class="upload-wrapper-form-content-album-link" href="/albums/index" >アルバム一覧</a>
  </label>
  <label class="upload-wrapper-form-content-album" for="file_input">
    <a class="upload-wrapper-form-content-album-link" href="/albums/{{$album->id}}/add" > アルバムに写真を追加</a>
  </label>
  @if(Auth::check() && Auth::user()->id == $album->user->id)
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
            <p class="album-pictures-wrapper-link-title">{{$favorit->title}} </p>
          </a>
        </div>
      @endforeach
  </div> 
</div>
     
@endsection