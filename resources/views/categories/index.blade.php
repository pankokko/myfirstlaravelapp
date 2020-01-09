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
      <a class="categories-wrapper-container-picture-link" href="/categories/{{$landscape->first()->category_id}}/list">
        <img class="categories-wrapper-container-picture-link-img" src="http://get.secret.jp/pt/file/1578535787.JPG"width="260" height="300">
      </a>
    <h1 class="categories-wrapper-container-picture-category">風景 <span class="picture-count">({{$landscape->count()}}枚)</span></h1>
      <p class="categories-wrapper-container-picture-text">山や海等自然の写真をピックアップしています。<br>自然の美しい写真をお楽しみください</p>
    </div>
    <div class="categories-wrapper-container-picture"> 
      <a class="categories-wrapper-container-picture-link" href="/categories/{{$city->first()->category_id}}/list">
        <img class="categories-wrapper-container-picture-link-img" src="http://get.secret.jp/pt/file/1578535883.JPG" width="260" height="300">
      </a>
    <h1 class="categories-wrapper-container-picture-category">建物 街並み<span class="picture-count">({{$city->count()}}枚)</span></h1>
      <p class="categories-wrapper-container-picture-text">あらゆる建造物の写真がここに載っています。</p>
    </div>
    <div class="categories-wrapper-container-picture"> 
      <a class="categories-wrapper-container-picture-link" href="/categories/{{$person->first()->category_id}}/list">
        <img class="categories-wrapper-container-picture-link-img" src="http://get.secret.jp/pt/file/1578536017.JPG"width="260" height="300">
      </a>
    <h1 class="categories-wrapper-container-picture-category">人物 <span class="picture-count">({{$person->count()}}枚)</span></h1>
      <p class="categories-wrapper-container-picture-text">赤ちゃんから大人までの<br>あらゆる人物の写真をピックアップ</p>
    </div>
    <div class="categories-wrapper-container-picture"> 
      <a class="categories-wrapper-container-picture-link" href="/categories/{{$creature->first()->category_id}}/list">
        <img class="categories-wrapper-container-picture-link-img" src="http://get.secret.jp/pt/file/1578536097.JPG"width="260" height="300">
      </a>
      <h1 class="categories-wrapper-container-picture-category">生き物 <span class="picture-count">({{$creature->count()}}枚)</span></h1>
      <p class="categories-wrapper-container-picture-text">猫や犬などの身近な動物から海の生き物まで<br>全ての動物の写真はこちらから</p>
    </div>
  </div>
</div>
@endsection