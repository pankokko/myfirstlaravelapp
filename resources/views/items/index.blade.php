@extends('layouts.default')
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
    <div>
  </div>
@endsection