@extends("layouts/default")
@include("components/header")
@section("content")
<div class="album-nav"> 
    <div class="album-nav-wrapper">
      <div class="album-nav-wrapper-list">
        <p>カテゴリー毎に写真を探す </p>
      </div>
    </div>
  </div>
<div class="categories-wrapper">
  <div class="categories-wrapper-container">
    <div class="categories-wrapper-container-picture"> 
      <a class="categories-wrapper-container-picture-link" href="#">
        <img class="categories-wrapper-container-picture-link-img" src="{{asset('/storage/thumbnail/1578143856.DSC00233.JPG')}}"width="260" height="300">
      </a>
    <h1 class="categories-wrapper-container-picture-category">風景 <span class="picture-count">({{$landscape}}枚)</span></h1>
      <p class="categories-wrapper-container-picture-text">山や海等自然の写真をピックアップしています。<br>自然の美しい写真をお楽しみください</p>
    </div>
    <div class="categories-wrapper-container-picture"> 
      <a class="categories-wrapper-container-picture-link" href="#">
        <img class="categories-wrapper-container-picture-link-img" src="{{asset('/storage/thumbnail/1578143856.DSC00233.JPG')}}"width="260" height="300">
      </a>
    <h1 class="categories-wrapper-container-picture-category">風景 <span class="picture-count">({{$city}}枚)</span></h1>
      <p class="categories-wrapper-container-picture-text">山や海等自然の写真をピックアップしています。<br>自然の美しい写真をお楽しみください</p>
    </div>
    <div class="categories-wrapper-container-picture"> 
      <a class="categories-wrapper-container-picture-link" href="#">
        <img class="categories-wrapper-container-picture-link-img" src="{{asset('/storage/thumbnail/1578143856.DSC00233.JPG')}}"width="260" height="300">
      </a>
    <h1 class="categories-wrapper-container-picture-category">風景 <span class="picture-count">({{$person}}枚)</span></h1>
      <p class="categories-wrapper-container-picture-text">山や海等自然の写真をピックアップしています。<br>自然の美しい写真をお楽しみください</p>
    </div>
    <div class="categories-wrapper-container-picture"> 
      <a class="categories-wrapper-container-picture-link" href="#">
        <img class="categories-wrapper-container-picture-link-img" src="{{asset('/storage/thumbnail/1578143856.DSC00233.JPG')}}"width="260" height="300">
      </a>
      <h1 class="categories-wrapper-container-picture-category">風景 <span class="picture-count">({{$creature}}枚)</span></h1>
      <p class="categories-wrapper-container-picture-text">山や海等自然の写真をピックアップしています。<br>自然の美しい写真をお楽しみください</p>
    </div>
  </div>
</div>
@endsection