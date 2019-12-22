@extends('layouts.default')
@section("title")
インデックスページ
@endsection
@section('content')
  <div class="pictures-wrapper">
    <div class="picture-wrapper_photo">
      <a href="#">
        <img class="picture-wrapper_photo-main"  src="{{ asset('images/DSC00178.JPG') }}" alt="logo" width="100%" height="600px">
      </a>
    </div> 
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
      <a  class="top-pictures-wrapper-link" href="#">
        <img class="top-pictures-wrapper-picture" src="{{asset('images/'. $item->image)}}"width="350" height="220px">
      </a>
    </div>
    @endforeach
    <div class="top-pictures-wrapper"> 
      <a  class="top-pictures-wrapper-link" href="#">
        <img class="top-pictures-wrapper-picture" src="{{asset('images/DSC00032.JPG')}}"width="350" height="220px">
      </a>
    </div>
    <div class="top-pictures-wrapper"> 
      <a class="top-pictures-wrapper-link" href="#">
        <img class="top-pictures-wrapper-picture" src="{{asset('images/DSC00102.JPG')}}"width="350" height="220px">
      </a>
    </div>
    <div class="top-pictures-wrapper"> 
      <a class="top-pictures-wrapper-link" href="#">
        <img class="top-pictures-wrapper-picture" src="{{asset('images/DSC00044.JPG')}}"width="350" height="220px">
      </a>
    </div>
    <div class="top-pictures-wrapper"> 
      <a class="top-pictures-wrapper-link" href="#">
        <img class="top-pictures-wrapper-picture" src="{{asset('images/DSC00192.JPG')}}"width="350" height="220px">
      </a>
    </div>
    <div class="top-pictures-wrapper"> 
      <a class="top-pictures-wrapper-link" href="#">
        <img class="top-pictures-wrapper-picture" src="{{asset('images/DSC00111.JPG')}}"width="350" height="220px">
      </a>
    </div> 
  </div>
@endsection