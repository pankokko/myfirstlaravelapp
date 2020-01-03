@extends('layouts.default')
@section("title")
インデックスページ
@endsection
@include("components/header")
@section('content')
  <div class="pictures-wrapper">
  @if($randoms)
    @foreach($randoms as $random)
    <div class="picture-wrapper_photo">
      <a href="items/{{$random->id}}/show">
        <img class="picture-wrapper_photo-main"  src="{{ asset('/storage/temp/'.$random->path) }}" alt="logo" width="100%" height="600px">
      </a>
    </div> 
    @endforeach 
  @endif
  </div>
  <div class="top-nav"> 
    <div class="top-nav-wrapper">
      <div class="top-nav-wrapper-list">
        <a class="top-nav-wrapper-list-link" href="#">おまかせ</a> 
      </div>
      <div class="top-nav-wrapper-list">
        <a class="top-nav-wrapper-list-link" href="#">新着</a> 
      </div>
    </div>
  </div>
  <div class="top-pictures">
    @foreach ($items as $item)
      <div class="top-pictures-wrapper"> 
        <a  class="top-pictures-wrapper-link" href="/items/{{$item->id}}/show">
          <img class="top-pictures-wrapper-picture" src="{{asset('/storage/temp/'.$item->path)}}"width="350" height="220px">
        </a>
      </div>
    @endforeach
  </div>
  @include("components/footer")
@endsection
