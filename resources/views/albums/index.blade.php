@extends('layouts.default')
@section("title")
アルバム一覧
@endsection
@include("components/header")
@section('content')
<div class="album-nav"> 
    <div class="album-nav-wrapper">
      <div class="album-nav-wrapper-list">
        <a class="album-nav-wrapper-list-link" href="#">アルバム一覧</a> 
      </div>
      <div class="album-nav-wrapper-list">
        <a class="album-nav-wrapper-list-link" href="/albums/new">アルバムを作る</a> 
      </div>
    </div>
  </div>
<div class="album-pictures">
@foreach($albums as $album)
  <div class="album-pictures-wrapper"> 
    <a  class="album-pictures-wrapper-link" href="#">
      <img class="album-pictures-wrapper-link-picture" src="{{asset( '/storage/thumbnail/'. $album->thumbnail )}}"width="350" height="220px">
      <p class="album-pictures-wrapper-link-title">{{$album->albumtitle}} </p>
    </a>
  </div>
@endforeach
</div>
@endsection