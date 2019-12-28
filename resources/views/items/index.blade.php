@extends('layouts.default')
@section("title")
インデックスページ
@endsection
@section('content')
  <div class="pictures-wrapper">
    @foreach($randoms as $random)
    <div class="picture-wrapper_photo">
      <a href="items/{{$random->id}}/show">
        <img class="picture-wrapper_photo-main"  src="{{ asset('/storage/temp/'.$random->path) }}" alt="logo" width="100%" height="600px">
      </a>
    </div> 
    @endforeach 
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
      <a  class="top-pictures-wrapper-link" href="items/{{$item->id}}/show">
        <img class="top-pictures-wrapper-picture" src="{{asset('/storage/temp/'.$item->path)}}"width="350" height="220px">
      </a>
    </div>
    @endforeach
  </div>
  <footer>
    <div class="pagetop">
      <a href="#" class="pagetop-link">
        <span class="pagetop-link-page-top">
          <i class="fa fa-angle-up" aria-hidden="true"></i>
          PAGE TOP
        </span>
      </a>  
    </div>
    <div class="copy">
      <div class="copy-right">
        Copyright © pankokko
      
      </div>
    </div>  
  </footer>
@endsection
